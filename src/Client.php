<?php

namespace Onetoweb\Mondu;

use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;
use Onetoweb\Mondu\Endpoint;
use Onetoweb\Mondu\Config\Method;
use DateTime;

/**
 * Mondu Client.
 */
class Client
{
    /**
     * Base Url.
     */
    public const BASE_URL = 'https://api.%smondu.ai/api/v%d';
    
    /**
     * @param string $apiKey
     * @param bool $sandbox = false
     * @param int $version = 1
     * @param string $webhookSecret
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $apiKey,
        private bool $sandbox = false,
        private int $version = 1,
        private string $webhookSecret = ''
    ) {
        // initialize endpoints
        $this->initializeEndpoints();
    }
    
    /**
     * @return void
     */
    private function initializeEndpoints(): void
    {
        $this->order = new Endpoint\Order($this);
        $this->invoice = new Endpoint\Invoice($this);
        $this->webhook = new Endpoint\Webhook($this);
    }
    
    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return sprintf(self::BASE_URL, ($this->sandbox ? 'demo.' : ''), $this->version);
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return array|null
     */
    public function get(string $endpoint, array $query = []): ?array
    {
        return $this->request(Method::GET, $endpoint, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return array|null
     */
    public function post(string $endpoint, array $data = []): ?array
    {
        return $this->request(Method::POST, $endpoint, [], $data);
    }
    
    /**
     * @param string $endpoint
     *
     * @return array|null
     */
    public function delete(string $endpoint): ?array
    {
        return $this->request(Method::DELETE, $endpoint);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     *
     * @return array|null
     */
    public function put(string $endpoint, array $data = []): ?array
    {
        return $this->request(Method::PUT, $endpoint, [], $data);
    }
    
    /**
     * @param Method $method
     * @param string $endpoint
     * @param array $query = []
     * @param array $data = []
     * 
     * @return array|null
     */
    public function request(Method $method, string $endpoint, array $query = [], array $data = []): ?array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::QUERY => $query,
            RequestOptions::HEADERS => [
                'Api-Token' => $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ];
        
        // add json body
        if (count($data) > 0) {
            $options[RequestOptions::JSON] = $data;
        }
        
        // build url
        $url = $this->getBaseUrl() . $endpoint;
        
        // make request
        $response = (new GuzzleCLient())->request($method->value, $url, $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        return json_decode($contents, true);
    }
}
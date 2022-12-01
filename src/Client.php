<?php

namespace Onetoweb\Mondu;

use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;
// use Onetoweb\Mondu\Token;
use DateTime;

/**
 * Mondu Client.
 */
class Client
{
    /**
     * Base Url.
     */
    const BASE_URL = 'https://api.%smondu.ai/api/v%d';
    
    /**
     * Methods.
     */
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PUT = 'PUT';
    
    /**
     * @var bool
     */
    private $sandbox;
    
    /**
     * @var int
     */
    private $version;
    
    /**
     * @param string $apiKey
     * @param bool $sandbox = false
     * @param int $version = 1
     * @param string $webhookSecret
     */
    public function __construct(string $apiKey, bool $sandbox = false, int $version = 1, string $webhookSecret = '')
    {
        $this->apiKey = $apiKey;
        $this->sandbox = $sandbox;
        $this->version = $version;
        $this->webhookSecret = $webhookSecret;
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
        return $this->request(self::METHOD_GET, $endpoint, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return array|null
     */
    public function post(string $endpoint, array $data = []): ?array
    {
        return $this->request(self::METHOD_POST, $endpoint, [], $data);
    }
    
    /**
     * @param string $endpoint
     *
     * @return array|null
     */
    public function delete(string $endpoint): ?array
    {
        return $this->request(self::METHOD_DELETE, $endpoint);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     *
     * @return array|null
     */
    public function put(string $endpoint, array $data = []): ?array
    {
        return $this->request(self::METHOD_PUT, $endpoint, [], $data);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $query = []
     * @param array $data = []
     * 
     * @return array|null
     */
    public function request(string $method, string $endpoint, array $query = [], array $data = []): ?array
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
        $response = (new GuzzleCLient())->request($method, $url, $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        return json_decode($contents, true);
    }
}
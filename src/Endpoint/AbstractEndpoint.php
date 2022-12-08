<?php

namespace Onetoweb\Mondu\Endpoint;

use Onetoweb\Mondu\Client;

/**
 * Abstract Endpoint.
 */
class AbstractEndpoint
{
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
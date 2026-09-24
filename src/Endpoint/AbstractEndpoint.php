<?php

namespace Onetoweb\Mondu\Endpoint;

use Onetoweb\Mondu\Client;

/**
 * Abstract Endpoint.
 */
class AbstractEndpoint
{
    /**
     * @param Client $client
     */
    public function __construct(
        protected Client $client
    ) {
        
    }
}
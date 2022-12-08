<?php

namespace Onetoweb\Mondu\Endpoint;

/**
 * Webhook Endpoint.
 */
class Webhook extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function key(): ?array
    {
        return $this->client->get('/webhooks/keys');
    }
    
    /**
     * @param array $query = []
     *
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/webhooks', $query);
    }
    
    /**
     * @param array $data = []
     *
     * @return array|null
     */
    public function create(array $data = []): ?array
    {
        return $this->client->post('/webhooks', $data);
    }
    
    /**
     * @param string $webhookUuid
     *
     * @return array|null
     */
    public function delete(string $webhookUuid): ?array
    {
        return $this->client->delete("/webhooks/$webhookUuid");
    }
    
    /**
     * @param string $resourceUuid
     * @param array $data = []
     *
     * @return array|null
     */
    public function replay(string $resourceUuid, array $data = []): ?array
    {
        return $this->client->put("/webhooks/replay/$resourceUuid", $data);
    }
    
}
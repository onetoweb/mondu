<?php

namespace Onetoweb\Mondu\Endpoint;

/**
 * Order Endpoint.
 */
class Order extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/orders', $query);
    }
    
    /**
     * @param string $orderUuid
     *
     * @return array|null
     */
    public function get(string $orderUuid): ?array
    {
        return $this->client->get("/orders/$orderUuid");
    }
    
    /**
     * @param array $data = []
     *
     * @return array|null
     */
    public function create(array $data = []): ?array
    {
        return $this->client->post('/orders', $data);
    }
    
    /**
     * @param string $orderUuid
     * @param array $query = []
     *
     * @return array|null
     */
    public function adjust(string $orderUuid, array $query = []): ?array
    {
        return $this->client->post("/orders/$orderUuid/adjust", $query);
    }
    
    /**
     * @param string $orderUuid
     * @param array $query = []
     *
     * @return array|null
     */
    public function cancel(string $orderUuid, array $query = []): ?array
    {
        return $this->client->post("/orders/$orderUuid/cancel", $query);
    }
    
    /**
     * @param string $orderUuid
     * @param array $data = []
     *
     * @return array|null
     */
    public function updateExternal(string $orderUuid, array $data = []): ?array
    {
        return $this->client->post("/orders/$orderUuid/update_external_info", $data);
    }
}
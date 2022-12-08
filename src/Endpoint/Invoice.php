<?php

namespace Onetoweb\Mondu\Endpoint;

/**
 * Invoice Endpoint.
 */
class Invoice extends AbstractEndpoint
{
    /**
     * @param array $query = []
     *
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/invoices', $query);
    }
    
    /**
     * @param string $orderUuid
     * @param array $query = []
     *
     * @return array|null
     */
    public function listByOrder(string $orderUuid, array $query = []): ?array
    {
        return $this->client->get("/orders/$orderUuid/invoices", $query);
    }
    
    /**
     * @param string $orderUuid
     * @param string $invoiceUuid
     *
     * @return array|null
     */
    public function getByOrder(string $orderUuid, string $invoiceUuid): ?array
    {
        return $this->client->get("/orders/$orderUuid/invoices/$invoiceUuid");
    }
    
    /**
     * @param string $orderUuid
     * @param array $data = []
     *
     * @return array|null
     */
    public function create(string $orderUuid, array $data = []): ?array
    {
        return $this->client->post("/orders/$orderUuid/invoices", $data);
    }
    
    /**
     * @param string $orderUuid
     * @param string $invoiceUuid
     *
     * @return array|null
     */
    public function cancel(string $orderUuid, string $invoiceUuid): ?array
    {
        return $this->client->post("/orders/$orderUuid/invoices/$invoiceUuid/cancel");
    }
    
    /**
     * @param string $orderUuid
     * @param string $invoiceUuid
     *
     * @return array|null
     */
    public function confirm(string $orderUuid, string $invoiceUuid): ?array
    {
        return $this->client->post("/orders/$orderUuid/invoices/$invoiceUuid/confirm_payment");
    }
    
    /**
     * @param string $orderUuid
     * @param string $invoiceUuid
     * @param array $data = []
     *
     * @return array|null
     */
    public function updateExternal(string $orderUuid, string $invoiceUuid, array $data = []): ?array
    {
        return $this->client->post("/orders/$orderUuid/invoices/$invoiceUuid/update_external_info", $data);
    }
    
    /**
     * @param string $invoiceUuid
     * @param array $query = []
     *
     * @return array|null
     */
    public function listCreditNotes(string $invoiceUuid, array $query = []): ?array
    {
        return $this->client->get("/invoices/$invoiceUuid/credit_notes", $query);
    }
    
    /**
     * @param string $invoiceUuid
     * @param string $creditNotesUuid
     *
     * @return array|null
     */
    public function getCreditNote(string $invoiceUuid, string $creditNotesUuid): ?array
    {
        return $this->client->get("/invoices/$invoiceUuid/credit_notes/$creditNotesUuid");
    }
    
    /**
     * @param string $invoiceUuid
     * @param array $data = []
     *
     * @return array|null
     */
    public function createCreditNote(string $invoiceUuid, array $data = []): ?array
    {
        return $this->client->post("/invoices/$invoiceUuid/credit_notes", $data);
    }
}
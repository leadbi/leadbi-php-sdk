<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Account Resource
 */
class Account {

    /**
     * Create new resource instance
     * @param $config - api configuration
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Fetch current account information
     */
    public function get() {
        return $this->api->get('/api/v1/account');
    }

    /**
     * Update account data
     */
    public function update($changes) {
        return $this->api->put('/api/v1/account', $changes);
    }

    /**
     * Fetch account usage
     */
    public function getUsage() {
        return $this->api->get('/api/v1/account/usage');
    }

    /**
     * Get account invoices
     */
    public function getInvoices() {
        return $this->api->get('/api/v1/account/invoices');
    }
}
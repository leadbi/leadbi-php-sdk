<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Templates Resource
 */
class Websites {

    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Fetch account websites
     */
    public function query() {
        return $this->api->get("/api/v1/websites");
    }

    /**
     * Create a new website
     */
    public function create($website) {
        return $this->api->post("/api/v1/websites", $website);
    }

    /**
     * Update existing website
     */
    public function update($websiteId, $changes) {
        return $this->api->put("/api/v1/websites/{$websiteId}", $changes);
    }

    /**
     * Delete website
     */
    public function remove($websiteId) {
        return $this->api->delete("/api/v1/websites/{$websiteId}");
    }

    /**
     * Fetch website
     */
    public function get($websiteId) {
        return $this->api->get("/api/v1/websites/{$websiteId}");
    }
}
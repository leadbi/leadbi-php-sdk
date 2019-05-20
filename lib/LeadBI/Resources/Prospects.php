<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Prospect Resource
 */
class Prospects {

    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Query prospects
     */
    public function query($websiteId, $filters = null) {
        $query = '';

        if($filters){
            $query .= '?' . \http_build_query($this->prepareFilters($filters));
        }

        return $this->api->get("/api/v1/prospects/{$websiteId}/all" . $query);
    }

    /**
     * Fetch prospect
     */
    public function get($websiteId, $prospectId){
        return $this->api->get("/api/v1/prospects/{$websiteId}/all/$prospectId");
    }

    /**
     * Create a new prospect
     */
    public function create($websiteId, $prospect) {
        // @TODO - add support for api call
        throw new \Exception('Not implemented');
    }

    /**
     * Update existing contact
     */
    public function update($websiteId, $prospectId, $prospect) {
        return $this->api->put("/api/v1/prospects/{$websiteId}/all/$prospectId", $prospect);
    }

    /**
     * Fetch prospect contacts
     */
    public function contacts($websiteId, $prospectId) {
        return $this->api->get("/api/v1/prospects/{$websiteId}/all/$prospectId/contacts");
    }

    /**
     * Fetch prospect history
     */
    public function history($websiteId, $prospectId) {
        return $this->api->get("/api/v1/prospects/{$websiteId}/all/$prospectId/history");
    }

    /**
     * Prepare filters before sending to api
     */
    private function prepareFilters($filters) {

        if(isset($filters['tags'])){
            $filters['tags'] = implode(',', $filters['tags']);
        }

        if(isset($filters['exclude_tags'])){
            $filters['exclude_tags'] = implode(',', $filters['exclude_tags']);
        }

        return $filters;
    }
}
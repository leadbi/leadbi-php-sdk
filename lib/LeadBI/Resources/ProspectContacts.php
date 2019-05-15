<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Prospect contacts Resource
 */
class ProspectContacts {
    
    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
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

    /**
     * Query prospect contacts
     * @param $websiteId
     * @param $filters->start
     * @param $filters->keyword
     * @param $filters->tags
     * @param $filters->exclude_tags
     * @param $filters->campaign
     * @param $filters->email_campaign
     * @param $filters->prospect
     * @param $filters->city
     * @param $filters->country
     * @param $filters->min_visits
     * @param $filters->max_visits
     * @param $filters->min_score
     * @param $filters->max_score
     * @param $filters->order_by
     * @param $filters->order
     * @param $filters->has_contact
     * @param $filters->has_company
     * @param $filters->has_phone
     * @param $filters->limit
     * @param $filters->offset
     * @param $filters->subscribed
     * @param $filters->bounced
     * @param $filters->unsubscribed
     * @param $filters->privacy_consent
     */
    public function query($websiteId, $filters = null) {
        $query = '';

        if($filters){
            $query .= '?' . \http_build_query($this->prepareFilters($filters));
        }

        return $this->api->get("/api/v1/visitors/{$websiteId}/all" . $query);
    }

    /**
     * Fetch prospect contact
     */
    public function get($websiteId, $contactId){
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId");
    }

    /**
     * Create a new contact
     */
    public function create($websiteId, $contact) {
        return $this->api->put("/api/v1/visitors/{$websiteId}/all/create_contact", $contact);
    }

    /**
     * Update existing contact
     */
    public function update($websiteId, $contactId, $contact) {
        return $this->api->put("/api/v1/visitors/{$websiteId}/all/$contactId", $contact);
    }

    /**
     * Remove contact
     */
    public function remove($websiteId, $contactId) {
        return $this->api->delete("/api/v1/visitors/{$websiteId}/all/$contactId");
    }

    /**
     * Fetch contact history
     */
    public function history($websiteId, $contactId) {
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId/history");
    }

    /**
     * Fetch contact advertising campaigns
     */
    public function campaigns($websiteId, $contactId) {
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId/campaigns");
    }

    /**
     * Fetch contact forms
     */
    public function forms($websiteId, $contactId) {
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId/forms");
    }

    /**
     * Fetch contact automations
     */
    public function automations($websiteId, $contactId) {
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId/automations");
    }

    /**
     * Fetch contact email campaigns
     */
    public function emailCampaigns($websiteId, $contactId) {
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId/email_campaigns");
    }

    /**
     * Fetch contact purchases
     */
    public function purchases($websiteId, $contactId) {
        return $this->api->get("/api/v1/visitors/{$websiteId}/all/$contactId/purchases");
    }
}
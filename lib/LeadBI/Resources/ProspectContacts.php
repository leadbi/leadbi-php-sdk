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
            $query .= '?' + \http_build_query($filters);
        }

        return $this->api->get("/api/v1/visitors/{$websiteId}/all" . $query);
    }
}
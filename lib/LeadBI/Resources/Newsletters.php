<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Newsletter Resource
 */
class Newsletters {
    
    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Query newsletters
     */
    public function query($websiteId, $filters=null){
        $query = '';

        if($filters){
            $query .= '?' + \http_build_query($filters);
        }

        return $this->api->get("/api/v1/newsletters/{$websiteId}" . $query);
    }

    /**
     * Fetch newsletter general stats
     */
    public function stats($websiteId, $filters=null){
        $query = '';

        if($filters){
            $query .= '?' + \http_build_query($filters);
        }

        return $this->api->get("/api/v1/newsletters/{$websiteId}/stats" . $query);
    }

    /**
     * Fetch newsletter email general stats
     */
    public function emailStats($websiteId, $filters=null){
        $query = '';

        if($filters){
            $query .= '?' + \http_build_query($filters);
        }

        return $this->api->get("/api/v1/newsletters/{$websiteId}/email_stats" . $query);
    }

    /**
     * Create a new newsletter
     */
    public function create($websiteId, $newsletter){
        return $this->api->post("/api/v1/newsletters/{$websiteId}", $newsletter);
    }

    /**
     * Update newsletter
     */
    public function update($websiteId, $newsletterId, $changes){
        return $this->api->patch("/api/v1/newsletters/{$websiteId}/{$newsletterId}", $changes);
    }

    /**
     * Delete newsletter
     */
    public function delete($websiteId, $newsletterId){
        return $this->api->delete("/api/v1/newsletters/{$websiteId}/{$newsletterId}");
    }

    /**
     * Fetch newsletter
     */
    public function get($websiteId, $newsletterId){
        return $this->api->get("/api/v1/newsletters/{$websiteId}/{$newsletterId}");
    }

    /**
     * Fetch newsletter stats
     */
    public function newsletterStats($websiteId, $newsletterId){
        return $this->api->get("/api/v1/newsletters/{$websiteId}/{$newsletterId}/stats");
    }

    /**
     * Send newsletter
     */
    public function send($websiteId, $newsletterId) {
        return $this->api->post("/api/v1/newsletters/{$websiteId}/{$newsletterId}/send", array());
    }

    /**
     * Schedule newsletter for sending
     */
    public function schedule($websiteId, $newsletterId, $dateTime) {
        return $this->api->post("/api/v1/newsletters/{$websiteId}/{$newsletterId}/schedule", array(
            'schedule_date' => $dateTime
        ));
    }

    /**
     * Fetch newsletter emails
     */
    public function newsletterEmails($websiteId, $newsletterId) {
        return $this->api->get("/api/v1/newsletters/{$websiteId}/{$newsletterId}/emails");
    }

    /**
     * Copy newsletter
     */
    public function copy($websiteId, $newsletterId, $copyName, $options = null) {
        return $this->api->post("/api/v1/newsletters/{$websiteId}/{$newsletterId}/copy", array(
            'name' => $copyName,
            'copy_template' => $options ? $options['copy_template'] : true,
            'copy_contacts' => $options ? $options['copy_contacts'] : true,
        ));
    }

    /**
     * Fetch newsletter html
     */
    public function newsletterHtml($websiteId, $newsletterId) {
        return $this->api->get("/api/v1/newsletters/{$websiteId}/{$newsletterId}/template_html");
    }
}
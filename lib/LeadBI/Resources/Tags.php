<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Tags Resource
 */
class Tags {

    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Assign tag to prospect company
     */
    public function assignTagToProspect($prospectId, $tagName) {
        return $this->api->post("/api/v1/tags/prospects/${$prospectId}", array(
            'tag_name' => $tagName
        ));
    }

    /**
     * Get prospect company tags
     */
    public function getProspectTags($prospectId) {
        return $this->api->get("/api/v1/tags/prospects/{$prospectId}");
    }

    /**
     * Assign tag to prospect contact
     */
    public function assignTagToContact($contactId, $tagName) {
        return $this->api->post("/api/v1/tags/contacts/${$contactId}", array(
            'tag_name' => $tagName
        ));
    }

    /**
     * Fetch prospect contact tags
     */
    public function getContactTags($contactId) {
        return $this->api->get("/api/v1/tags/prospects/{$contactId}");
    }

    /**
     * Remove prospect company tag
     */
    public function removeProspectTag($prospectId) {
        return $this->api->post("/api/v1/tags/prospects/${$prospectId}", array());
    }

    /**
     * Remove contact tag
     */
    public function removeContactTag($contactId) {
        return $this->api->post("/api/v1/tags/contacts/${$contactId}", array());
    }

    /**
     * Fetch all account tags
     */
    public function all() {
        return $this->api->get("/api/v1/tags");
    }

    /**
     * Remove account tag
     */
    public function removeTag($tagId) {
        return $this->api->get("/api/v1/tags/{$tagId}");
    }
}


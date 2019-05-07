<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Templates Resource
 */
class Templates {
    
    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Query templates
     */
    public function query($websiteId, $filters=null) {
        $query = '';

        if($filters){
            $query .= '?' . \http_build_query($filters);
        }

        return $this->api->get("/api/v1/templates/{$websiteId}" . $query);
    }

    /**
     * Create new email template
     */
    public function create($websiteId, $template) {
        return $this->api->post("/api/v1/templates/{$websiteId}", $template);
    }

    /**
     * Update existing email template
     */
    public function update($websiteId, $templateId, $changes) {
        return $this->api->patch("/api/v1/templates/{$websiteId}/{$templateId}", $changes);
    }

    /**
     * Remove template
     */
    public function remove($websiteId, $templateId) {
        return $this->api->delete("/api/v1/templates/{$websiteId}/{$templateId}");
    }

    /**
     * Fetch template
     */
    public function get($websiteId, $templateId) {
        return $this->api->get("/api/v1/templates/{$websiteId}/{$templateId}");
    }

    /**
     * Copy existing template
     */
    public function copy($websiteId, $templateId, $copyName) {
        return $this->api->post("/api/v1/templates/{$websiteId}/{$templateId}/copy", array(
            'name' => $copyName
        ));
    }
}

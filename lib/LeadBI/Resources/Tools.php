<?php

namespace LeadBI\Resources;

use LeadBI\LeadBIAPI;

/**
 * LeadBI Tools Resource
 */
class Tools
{

    /**
     * Create new resource instance
     */
    public function __construct($config)
    {
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Send a test email
     */
    public function sendApplicationEmail($email)
    {
        return $this->api->post("/api/v1/tools/send_application_email", $email);
    }

}
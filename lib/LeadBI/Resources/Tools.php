<?php
/**
 * NOT Available!
 */
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
        throw new \Exception('Api call not available!');
    }

}
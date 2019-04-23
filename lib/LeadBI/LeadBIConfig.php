<?php
namespace LeadBI;

class LeadBIConfig {

    /**
     * API access id (can be created in Account -> API Keys)
     */
    public $accessId;
    
    /**
     * API access secret (can be found in Account -> API Keys)
     */
    public $accessSecret;

    /**
     * The api endpoint (default is app.leadbi.com)
     */
    public $endpoint;

    /**
     * Make the requests via https or http (default https)
     */
    public $secure;

    /**
     * Debug flag 
     */
    public $debug = false;

    /**
     * Create new LeadBI API object
     */
    public function __construct($accessId, $accessSecret, $endpoint = 'app.leadbi.com', $secure=true) {
        $this->accessId = $accessId;
        $this->accessSecret = $accessSecret;
        $this->endpoint = $endpoint;
        $this->secure = $secure;
    }
}
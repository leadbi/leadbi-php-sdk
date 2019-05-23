<?php
namespace LeadBI;

class LeadBIAPI {

    /**
     * Create new api instance
     */
    public function __construct($config){
        $this->config = $config;
    }

    /**
     * Create curl handler and initialize with the access keys
     */
    private function getCurlObject($path){
        $curl = \curl_init();
        \curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->config->secure ? 
                "https://{$this->config->endpoint}$path" : "http://{$this->config->endpoint}$path",
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                "X-Access-Id: {$this->config->accessId}",
                "X-Access-Secret: {$this->config->accessSecret}",
            ),
            CURLOPT_VERBOSE => $this->config->debug, // debug only
            CURLOPT_SSL_VERIFYPEER => $this->config->debug ? false : true // debug only
        ));
        return $curl;
    }

    /**
     * Make get request
     */
    public function get($path){
        $ch = $this->getCurlObject($path);
        $result = \curl_exec($ch);
        \curl_close($ch);
        return \json_decode($result);
    }

    /**
     * Make post request
     */
    public function post($path, $data){
        $ch = $this->getCurlObject($path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    /**
     * Make put request
     */
    public function put($path, $data) {
        $ch = $this->getCurlObject($path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    /**
     * Make delete request
     */
    public function delete($path, $data = null){
        $ch = $this->getCurlObject($path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    /**
     * Make patch request
     */
    public function patch($path, $data){
        $ch = $this->getCurlObject($path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

}
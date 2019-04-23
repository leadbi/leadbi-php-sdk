<?php

namespace LeadBI\Resources;

/**
 * LeadBI Users Resource
 */
class Users {

    /**
     * Create new resource instance
     */
    public function __construct($config){
        $this->api = new LeadBIAPI($config);
    }

    /**
     * Query account users
     */
    public function query() {
        return $this->api->get("/api/v1/users");
    }

    /**
     * Create new user
     */
    public function create($user) {
        return $this->api->post("/api/v1/users", $user);
    }

    /**
     * Update existing user
     */
    public function update($userId, $changes) {
        return $this->api->put("/api/v1/users/{$userId}", $changes);
    }

    /**
     * Remove user
     */
    public function remove($userId) {
        return $this->api->delete("/api/v1/users/{$userId}");
    }

    /**
     * Fetch user
     */
    public function get($userId) {
        return $this->api->get("/api/v1/users/{$userId}");
    }
}
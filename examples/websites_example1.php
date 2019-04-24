<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\Websites;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT);
$config->debug = DEBUG;

$api = new Websites($config);

// get account websites
$websites = $api->query();

// create new website
$domain = time() . '.com';
$newWebsite = $api->create(array(
    'domain' => $domain,
    'integrations' => new stdClass()
));

// update website
$api->update($newWebsite->insert_id, array(
    'integrations' => new stdClass()
));
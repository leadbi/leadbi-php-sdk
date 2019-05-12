<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\ProspectContacts;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT, SECURE);
$config->debug = DEBUG;

$api = new ProspectContacts($config);

$websiteId = 4;

// fetch contacts
$contacts = $api->query($websiteId);

// filter contacts by tag
$contacts = $api->query($websiteId, array(
    'tags' => [2] // use tag id
));

// show contents
var_dump($contacts);
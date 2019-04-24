<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\ProspectContacts;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT, SECURE);
$config->debug = DEBUG;

$api = new ProspectContacts($config);

$websiteId = 4;

$contacts = $api->query($websiteId);

var_dump($contacts);
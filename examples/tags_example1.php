<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\Tags;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT, SECURE);
$config->debug = DEBUG;

$api = new Tags($config);

// assign tag to contact
$api->assignTagToContact(92, 'sdk-test');

// fetch contact tags
$contactTags = $api->getContactTags(92);

// view tags
var_dump($contactTags);
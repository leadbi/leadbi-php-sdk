<?php
/**
 * NOT Available!
 */
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\Tools;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT, SECURE);
$config->debug = DEBUG;

$api = new Tools($config);

// Send a test email
$testEmail = $api->sendApplicationEmail(array(
    'from' => 'Test example <sender@example.com>',
    'to' => 'test@example.com',
    'subject' => 'Text example',
    'html' => '<b>hello</b>'
));
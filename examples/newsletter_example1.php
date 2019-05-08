<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\Newsletters;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT, SECURE);
$config->debug = DEBUG;

$websiteId = 4;
$api = new Newsletters($config);

// create a new newsletter
$newsletter = $api->create($websiteId, array(
    'name' => 'Example Newsletter',
    'subject' => 'Example email subject',
    'from_email' => 'andrei@example.com',
    'from_name' => 'Andrei',
    'reply_to' => 'support@example.com',
    'template' => array(
        'html' => '<b>hello</b>'
    ),
    'list' => array(),
    'contacts' => array(92),
    'tags' => array('example_newsletter'),
    'filters' => array(),
    'editor' => Newsletters::DEFAULT_EDITOR
));

// send newsletter
$api->send($websiteId, $newsletter->insert_id);
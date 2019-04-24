<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using
require 'example_config.php';

use LeadBI\LeadBIConfig;
use LeadBI\Resources\Account;

$config = new LeadBIConfig(ACCESS_ID, SECRET_KEY, ENDPOINT, SECURE);
$config->debug = DEBUG;

$api = new Account($config);

// get account info
$account = $api->get();

// update account name
$result = $api->update(array('company_name' => 'Example 1, Inc'));

// get usage
$usage = $api->getUsage();

// get invoices
$invoices = $api->getInvoices();
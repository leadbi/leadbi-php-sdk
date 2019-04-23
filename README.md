# LeadBI PHP SDK

## Install
Add the LeadBI PHP SDK as a dependency to your composer.json file:
```
{
  "require": {
    "leadbi/leadbi-php-sdk": "dev-master"
  }
}
```

Consider replacing dev-master with the latest version in order to pin your dependencies.

Install the Composer dependency:
```
php composer.phar install
```

## Usage
This example demonstrates how you can use the SDK to access the api.

```
<?php
require 'vendor/autoload.php';

use LeadBI\LeadBIAPI;


// Show the results
echo '<pre>';
print_r($response);
echo '</pre>';
```

## Examples
More examples can be found in `./examples` directory.

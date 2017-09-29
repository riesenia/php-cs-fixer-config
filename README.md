# PHP Coding Standards Fixer Rules

This repository provides configurations for [`friendsofphp/php-cs-fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer).

## Installation

Install the latest version using `composer require --dev rshop/php-cs-fixer-config`

## Usage

Create a configuration file *.php_cs* in the root of your project:

```php
<?php

$config = new Rshop\CS\Config\Rshop();

$config->getFinder()->in(__DIR__);

return $config;
```
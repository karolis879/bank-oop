<?php

use Bank\App;
session_start();
define('URL', 'http://bank.test/');
require __DIR__.'/../vendor/autoload.php';

echo App::start();


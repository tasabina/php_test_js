<?php
define('ROOT', dirname(__DIR__).'/');
define('CORE', dirname(__DIR__) . '/vendor/core');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('APP', dirname(__DIR__) . '/app');
define('DATA', dirname(__DIR__) . '/public/data/');

ini_set('display_errors', 1);
require_once 'bootstrap.php';

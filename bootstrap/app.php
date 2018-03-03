<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = ( new Dotenv\Dotenv(__DIR__.'/..//'))->load();
var_dump(getenv('APP_NAME'));

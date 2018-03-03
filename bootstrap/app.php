<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

try {
  $dotenv = ( new Dotenv\Dotenv(__DIR__.'/..//'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {

}

require_once __DIR__.'/container.php';

//call from container
$route = $container->get(League\Route\RouteCollection::class);

require_once __DIR__ . '/../routes/web.php';

//if route match with RouteCollection akan response
$response = $route->dispatch(
  $container->get('request'), $container->get('response')
);

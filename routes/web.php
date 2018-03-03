<?php

$route->get('/', function($request, $response){
  //write on body
  $response->getBody()->write('Home');

  return $response;
});

$route->post('/api', function($request, $response){
  return $request;
});

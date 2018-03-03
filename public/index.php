<?php

require_once __DIR__ . '/../bootstrap/app.php';

//print out to page
$container->get('emitter')->emit($response);

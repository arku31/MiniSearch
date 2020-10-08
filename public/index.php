<?php

use Arku\MiniSearch\Application;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

require "../vendor/autoload.php";
$application = new Application();
$response = $application->run();

$emitter = new SapiEmitter();
$emitter->emit($response);

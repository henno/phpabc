<?php
require 'config.php';
require 'database.php';
require 'app.php';

$body = request::body();
$method = request::method();
$endpoint = request::endpoint();


$app = new app(
    $request,
    $method,
    $endpoint);



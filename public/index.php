<?php

session_start();

require '../app/core/router.php';
require '../app/core/middleware.php';
require '../app/services/authServices.php';
require '../app/controllers/homeController.php';
require '../app/controllers/authController.php';
require '../app/controllers/dashboardController.php';
require '../config/database.php';

$router = new Router();
require '../routes/web.php';

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$url = parse_url($requestUri, PHP_URL_PATH) ?? '/';
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');

if ($scriptDir !== '' && $scriptDir !== '/' && strpos($url, $scriptDir) === 0) {
    $url = substr($url, strlen($scriptDir));
}

if ($url === '' || $url === '/index.php') {
    $url = '/';
}

if (strpos($url, '/index.php/') === 0) {
    $url = substr($url, strlen('/index.php'));
}

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router->resolve($url, $method);

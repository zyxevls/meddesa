<?php

define('BASE_PATH', __DIR__ . '/..');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers/flasher.php';
require_once __DIR__ . '/../app/helpers/breadcrumb.php';

session_start();

require_once __DIR__ . '/../app/core/router.php';
require_once __DIR__ . '/../app/core/middleware.php';
require_once __DIR__ . '/../app/services/authServices.php';
//controller
require_once __DIR__ . '/../app/controllers/homeController.php';
require_once __DIR__ . '/../app/controllers/authController.php';
require_once __DIR__ . '/../app/controllers/dashboardController.php';
require_once __DIR__ . '/../app/controllers/obatController.php';
require_once __DIR__ . '/../app/controllers/pasienController.php';
require_once __DIR__ . '/../app/controllers/reservasiController.php';
require_once __DIR__ . '/../app/controllers/rekamMedisController.php';
//repository
require_once __DIR__ . '/../app/repositories/obatRepository.php';
require_once __DIR__ . '/../app/repositories/pasienRepository.php';
require_once __DIR__ . '/../app/repositories/reservasiRepository.php';
require_once __DIR__ . '/../app/repositories/rekamMedisRepository.php';
//model
require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/Pasien.php';
require_once __DIR__ . '/../app/models/Obat.php';
require_once __DIR__ . '/../app/models/Reservasi.php';
require_once __DIR__ . '/../app/models/RekamMedis.php';
require_once __DIR__ . '/../app/models/Dokter.php';
require_once __DIR__ . '/../app/models/User.php';
require_once __DIR__ . '/../config/database.php';

bootstrapFlasher();

$router = new Router();
require __DIR__ . '/../routes/web.php';

// Parse URL path from request
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

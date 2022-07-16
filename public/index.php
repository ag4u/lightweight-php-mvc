<?php

declare(strict_types=1);

use Symfony\Component\Dotenv\Dotenv;
use App\Framework\Application;
use App\Framework\Router;
use App\Framework\Request;
use App\Framework\View;
use App\Framework\Database;

const BASE_DIR = __DIR__ . '/..';
const APP_DIR = BASE_DIR . '/app';

require_once BASE_DIR . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(BASE_DIR . '/.env');

$app = new Application(
  new Router(),
  new Request(),
  new Database(),
  View::class
);

$routesWeb = require BASE_DIR . '/routes/Web.php';
$routesApi = require BASE_DIR . '/routes/Api.php';

$app->router->addRoutes($routesWeb);
$app->router->addRoutes($routesApi);

$app->run();

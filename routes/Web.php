<?php

namespace App\Routes;

use App\Controller;
use App\Framework\Route;

return [
  new Route(Route::METHOD_GET, '/', [Controller\IndexController::class, 'IndexAction']),
  new Route(Route::METHOD_GET, '/welcome', [Controller\IndexController::class, 'WelcomeAction']),
];
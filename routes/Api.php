<?php

namespace App\Routes;

use App\Controller;
use App\Framework\Route;

return [
  new Route(Route::METHOD_POST, '/api/reverse', [Controller\ApiController::class, 'ReverseAction']),
];
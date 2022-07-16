<?php

namespace App\Framework;

use App\Framework\Throwable\ErrorUnknownRoute;

class Router
{
  public array $routes = [];

  protected function getSortedRoutes(): array {
    $routesSorted = $this->routes;

    usort($routesSorted, function(Route $a, Route $b) {
      return strlen($a->path) <=> strlen($b->path);
    });

    return $routesSorted;
  }

  public function resolve(Request $request): Route {
    $requestPath = $request->getPath();
    $requestMethod = $request->getMethod();

    foreach ($this->getSortedRoutes() as $route) {
      if (
        $route->path === $requestPath &&
        $route->method === $requestMethod
      ) {
        return $route;
      }
    }

    throw new ErrorUnknownRoute('Unknown route for path: ' . $requestPath);
  }

  public function addRoutes(array $routes): void {
    $this->routes = array_merge($this->routes, $routes);
  }
}
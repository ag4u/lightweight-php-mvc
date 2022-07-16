<?php

namespace App\Framework;

use App\Framework\Throwable\ErrorUnknownRoute;

class Application
{
  protected static self $instance;
  public Router $router;
  public Request $request;
  public Database $database;
  public string $viewClass;

  public function __construct(Router $router, Request $request, Database $database, string $viewClass)
  {
    $this->router = $router;
    $this->request = $request;
    $this->database = $database;
    $this->viewClass = $viewClass;
    self::$instance = $this;
  }

  public static function getInstance(): self {
    if (empty(self::$instance)) throw new \Exception(
      'Cannot access instance before initialization'
    );

    return self::$instance;
  }

  public function run(): void {
    try {
      $route = $this->router->resolve(
        $this->request
      );
      $view = new $this->viewClass;

      echo call_user_func_array(
        [
          new $route->callback[0]($view),
          $route->callback[1]
        ], [
          $this->request,
        ]
      );

    } catch (ErrorUnknownRoute $e) {
      exit($e->getMessage());
    }
  }
}
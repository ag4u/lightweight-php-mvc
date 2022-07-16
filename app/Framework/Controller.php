<?php

namespace App\Framework;

abstract class Controller
{
  public View $view;

  public function __construct(View $view) {
    $this->view = $view;
  }

  public function json($data): string {
    header('Content-Type: application/json;charset=utf-8');

    return json_encode($data);
  }

  public function forward(string $url): string {
    ob_start();
    header('Location: ' . $url);

    return ob_get_clean();
  }
}
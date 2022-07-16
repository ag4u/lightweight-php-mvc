<?php

namespace App\Framework;

class Request
{
  public function getPath(): string {
    $uri = $_SERVER['REQUEST_URI'] ?? '/';

    return explode('?', $uri)[0];
  }

  public function getMethod(): string {
    return $_SERVER['REQUEST_METHOD'] ?? 'GET';
  }

  public function getInputAsJson() {
    $input = file_get_contents('php://input');

    return json_decode($input);
  }
}
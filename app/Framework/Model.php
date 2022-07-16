<?php

namespace App\Framework;

use App\Framework\Database;

abstract class Model
{
  public function __construct($attributes) {
    foreach ($attributes as $key => $value) {
      if (property_exists($this, $key)) {
        $this->{$key} = $value;
      }
    }
  }


  public function __get(string $name) {
    return $this->{$name};
  }

  public function __set(string $name, $value): void {
    $this->{$name} = $value;
  }
}
<?php

namespace App\Model;

use App\Framework\Application;
use App\Framework\Model;

class Greeting extends Model
{
  protected $id;
  protected $text;

  public static function loadRandom(): ?self {
    $result = Application::getInstance()->database->query(
      'SELECT * FROM greeting WHERE :parameterExample ORDER BY RAND() LIMIT 1',
      [
        'parameterExample' => ['1', \PDO::PARAM_INT],
      ]
    );

    if (
      empty($result) ||
      empty($row = $result->fetch(\PDO::FETCH_ASSOC))
    ) return null;

    return new self($row);
  }
}
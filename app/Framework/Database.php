<?php

namespace App\Framework;

class Database
{
  protected \PDO $connection;

  public function getConnection() {
    if (empty($this->connection) || !$this->connection instanceof \PDO) {
      try {
        $this->connection = new \PDO(
          "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=UTF8",
          $_ENV['DB_USER'],
          $_ENV['DB_PASS']
        );
      } catch (\PDOException $e) {
        exit($e->getMessage());
      }    
    }

    return $this->connection;
  }

  public function query(string $sql, array $params = []): ?\PDOStatement {
    $connection = $this->getConnection();
    $statement = $connection->prepare($sql);

    foreach ($params as $key => $value) {
      $statement->bindValue($key, ...$value);
    }

    if (!$statement->execute()) return null;

    return $statement;
  }
}
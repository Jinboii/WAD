<?php
class ConnectionManager {

  public function getConnection() {
      $dsn = "mysql:host=localhost;dbname=rebirth";
      $pdo = new PDO($dsn, "root", ""); 
      return $pdo;
  }
}
?> 
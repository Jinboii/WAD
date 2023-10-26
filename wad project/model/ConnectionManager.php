<?php
class ConnectionManager {

  public function getConnection() {
      $dsn = "mysql:host=localhost;dbname=listing";
      $pdo = new PDO($dsn, "root", ""); 
      return $pdo;
  }
}
?> 
<?php

  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'tododb';
    private $username = 'root';
    private $password = '';
    private $connection;

    // DB Connect
    public function initConnection()
    {
      $this->connection = null;

      try { 
        $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $exp) {
        echo 'Connection Error: ' . $exp->getMessage();
      }

      return $this->connection;
    }
  }

?>
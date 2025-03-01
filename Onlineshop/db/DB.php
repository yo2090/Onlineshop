<?php

class DB {

    private $conn;
    private $host = '127.0.0.1:3307';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'online_shop';

    protected function connect (): PDO {
        $this->conn =  new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
        return $this->conn;
    }
    
}
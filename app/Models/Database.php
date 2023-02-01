<?php
namespace App\Models;

Class Database {
    private $db_host = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "login-register-php-oops";
    protected $connection;

    public function __construct(){
        $this->connection = $this->setConnection();
    }

    private function setConnection(){
        return new \mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);
    }
}
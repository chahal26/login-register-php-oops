<?php
namespace App\Models;

Class Database {
    private $db_host = DB_HOST;
    private $db_username = DB_USER;
    private $db_password = DB_PASSWORD;
    private $db_name = DB_NAME;
    protected $connection;

    public function __construct(){
        $this->connection = $this->setConnection();
    }

    private function setConnection(){
        return new \mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);
    }
}
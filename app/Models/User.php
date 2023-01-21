<?php
namespace App\Models;

class User extends Database
{
    protected $table = "users";

    public function getUsers(){
        $sql = "SELECT * FROM $this->table";
        $result = $this->connection->query($sql);

        return $result;
    }

    public function insert($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = md5($data['password']);
        $sql = "INSERT INTO $this->table (name, email, phone, password)
                VALUES ('$name', '$email', '$phone', '$password')";
        if ($this->connection->query($sql) === TRUE) {
            echo'insert ho gya';
            return true;
        }

        return false;
    }

    public function checkIfUserExists($email, $password)
    {
        $sql = "SELECT id FROM $this->table WHERE email='$email' AND password='$password'";
        $result = $this->connection->query($sql);

        if($result->num_rows == 0){
            return false;
        }

        return $result->fetch_assoc()['id'];
    }
}
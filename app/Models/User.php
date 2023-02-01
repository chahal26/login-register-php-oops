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

    public function validate($data){
        $errors = [];  
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($data['name'])) {
                $errors['name'] = "Name field is Required.";
            } 
            
            else if(!preg_match("/^[a-zA-Z ]*$/", $data['name'])) {
                $errors['name'] = "Name contains Only letters.";
            }

            else if(!preg_match("/^[A-Z]/",$data['name'])){
                $errors['name'] = "Name contains first letters capital.";
            }
        
            else if(strlen($data['name'])<=2){
                $errors['name'] ="Name contains atleast two character or more";
            }

            if(empty($data['email'])) {
                $errors['email'] = "Email field is Required.";
            } else if (!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/",$data['email'])) {
                $errors['email'] = "PLease Enter Valid Email Address";
            }

            if(empty($data['password'])) {
                $errors['password'] = "Password field is Required.";
            } else if (strlen($data['password']) < 8) {
                $errors['password'] = "Password must be at least 8 characters.";
            }

            if(empty($data['phone'])) {
                $errors['phone'] = "Phone number is Required.";
            }else if(strlen($data['phone'])!= 10){
                $errors['phone'] = "Phone number must be 10 digits.";
            }

            if (count($errors) > 0) {
                $_SESSION['data'] = $data;
                $_SESSION['errors'] = $errors;
                return $errors;
            } else {
                return "true";
            }
        }

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
            $_SESSION['success'] = 'Data has been added successfully';
            return true;
        }

        return false;
    }

    public function checkIfUserExists($email, $password)
    {
        $sql = "SELECT id FROM $this->table WHERE email='$email' AND password='$password'";
        $result = $this->connection->query($sql);

        if($result->num_rows == 0){
            $_SESSION['invalid'] = 'User does not exist';
            return false;
        }

        return $result->fetch_assoc()['id'];
    }
}

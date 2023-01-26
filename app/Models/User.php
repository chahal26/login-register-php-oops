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

    public function validate($name , $email , $password , $phone){
       

        $errors = [];  
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
            // die;
            if(empty($name)) {


                $errors['name'] = "Name field is empty.";

            } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors['name'] = "Only letters and white space allowed for name.";
            }
    
            if(empty($email)) {
                $errors['email'] = "Email field is empty.";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            }
    
            if(empty($password)) {
                $errors['password'] = "Password field is empty.";
            } else if (strlen($password) < 8) {
                $errors['password'] = "Password must be at least 8 characters.";
            }


        //     echo '<pre>';
        //     print_r(count($errors));
        //     echo '</pre>';
        //    die;
    
            if (count($errors) > 0) {
                $_SESSION['data'] = ['name' => $name , 'email'=> $email , 'password' => $password, 'phone' =>$phone];
                $_SESSION['errors'] = $errors;
                return $errors;
            } else {

         
                return "Input is valid.";
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

    public function getUserData($userid)
    {
        $sql = "SELECT * FROM $this->table WHERE id=$userid";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }
}

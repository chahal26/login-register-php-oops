<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Validate;

Class AuthController{

    public function register(){
        session_destroy();
        require_once "resources/views/auth/register.php";
    }

    public function registerPost(){
        $user = new User();
        $data = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "password" => $_POST['password'],   
        );
        $validate = $user->validate($data);
        if($validate == "true"){   
            $user->insert($_POST);
        }
        header("Location: register");
    }

    public function login(){
        session_destroy();
        require_once "resources/views/auth/login.php";
    }

    public function loginPost(){
        $user = new User();
        $loginUser = $user->checkIfUserExists($_POST['email'], md5($_POST['password']));
        if($loginUser == false){
            echo 'Invalid Credentials';
            header("Location: login");
            // return false; 
            // echo"<pre>";
            // print_r( $_SESSION);
            // echo"</pre>";
            // die;
        }else{

            $_SESSION['login_user'] = $loginUser;

            header("Location: profile");
        }

        
    }
}
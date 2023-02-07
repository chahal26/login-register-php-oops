<?php
namespace App\Controllers;

use App\Models\User;
use  App\Models\Validate;
Class AuthController{

    public function __construct(){
        if(auth() != null){
            header("Location: profile");
        }
    }

    public function register(){  
        require_once "resources/views/auth/register.php";
    }

    public function registerPost(){
        $validatate = new Validate($_POST);
        $validatate->exist();
        if(empty($validatate->errors)){

            $user = new User();
            $user->insert($_POST);
            header("Location: register");
        }else{
            $validatate-> showError();
        }

    }

    public function login(){
        require_once "resources/views/auth/login.php";
    }

    public function loginPost(){
        $validatate = new Validate($_POST);
        $validatate->exist();
        if(empty($validatate->errors)){

            $user = new User();
        $loginUser = $user->checkIfUserExists($_POST['email'], md5($_POST['password']));

        if($loginUser === false){
            return 'Invalid Credentials';
        }

        $_SESSION['login_user'] = $loginUser;
        
        header("Location: profile");

        }else{
            $validatate-> showError();
        }

    }
       
    }
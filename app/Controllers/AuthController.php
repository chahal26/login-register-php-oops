<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\InputValidator;

Class AuthController{

    public function __construct(){
        if(auth() != null){
            header("Location: profile");
        }



    }

    public function register(){  
        session_destroy();
        require_once "resources/views/auth/register.php";
    }




    public function registerPost(){
            $user = new User();
         $validate =   $user->validate($_POST['name'], $_POST['email'], $_POST['password'],$_POST['phone'] );
        //        echo '<pre>';
        //     print_r(($_SESSION['errors']));
        //     echo '</pre>';
        //    die;
        if($validate == "Input is valid."){
            $user->insert($_POST);
        }
        header("Location: register");
    }

    public function login(){
        require_once "resources/views/auth/login.php";
    }

    public function loginPost(){
        $user = new User();
        $loginUser = $user->checkIfUserExists($_POST['email'], md5($_POST['password']));

        if($loginUser === false){
            return 'Invalid Credentials';
        }

        $_SESSION['login_user'] = $loginUser;
        
        header("Location: profile");
    }
}
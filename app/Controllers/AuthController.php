<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Validate;

Class AuthController{
    public function register(){
        require_once "resources/views/auth/register.php";
    }

    public function registerPost(){
          if(empty($validation=new validate($_POST))){
              $user = new User();
              $user->insert($_POST);
              echo'Registered Succesful';
          }else{
            $validation->show_error();
          }
        // print_r($validation->validate_details($_POST));
        // if(empty($validation->validate_details($_POST))){
        //     header("Location: register");
        // }
    //      else{
    //          $validation->show_error();
    //   }
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
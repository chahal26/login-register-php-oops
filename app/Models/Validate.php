<?php
namespace App\Models;

//  class Validate extends User
// {
//   private $errors=[];
//   public function validate_details($data){
//         if(empty($data['name']))
//             {
//              $this->errors[]='Name is required';
//             }
//         if(empty($data['password']))
//             {
//                 $this->errors[]='password is required';
//             }
//         if(empty($data['email']))
//             {
//                 $this->errors[]='Email is required';
//             }else{
//                 $email_sql="SELECT *from `$this->table`  WHERE email='$data[email]'";
//                 $result = $this->connection->query($email_sql);
//                 if($result->num_rows == 0){
                   
//                 }else{
//             $this->errors[]='Email already exist';
//         }
//             }
//        return $this->errors;
//       }
//     public function show_error(){
//         foreach ( $this->errors as $errors) {
//          echo $errors;
//          echo'<br>';
//         }
//     } 
//    }
        class Validate extends User
        {
        public $errors=[],$name,$email,$password;
        public function __construct($data){
            parent::__construct();
            $this->name=$this->getName($data['name']);
            $this->email=$this->getEmail($data['email']);
            $this->password=$this->getPassword($data['password']);
        }
            public function getName($Name){
                if(empty($Name))
                    {
                      $this->errors[]='Name is required';
                    }
                }
                public function getPassword($Password){
                    if(empty($Password))
                    {
                        $this->errors[]='password is required';

                    }
                }
                public function getEmail($Email){
                    if(empty($Email))
                    {
                        $this->errors[]='Email is required';
                       
                    }else{
                        $email_sql ="SELECT *from `$this->table`  WHERE email='$Email'";
                        $result = $this->connection->query($email_sql);
                        if($result->num_rows == 0)
                        {
                            return;
                        }else{
                            $this->errors[]='Email already exist';
                             }
                    }  
            }    
            public function show_error(){
                foreach ( $this->errors as $errors) {
                echo $errors;
                echo'<br>';
                }
            } 
        }   
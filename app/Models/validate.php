<?php
    namespace App\Models;
    class Validate extends User {
        public $errors=[];
        public $getdata;
        public function __construct($getdata) {
            parent::__construct();
            $this->getdata=$getdata;
            foreach ($this->getdata as $key => $value) {
                // echo $value;
                // die;
               $this->emptyfiled($key,$value);
           }
        }
        public function emptyfiled($key,$val) {
            if(empty($val)) {
                $this->errors[]= "$key cannot be empty";
            }
        }
        public function exist(){
            $email=$this->getdata['email'];
              



            $sql="SELECT * FROM $this->table WHERE email='$email'";

            //   print_r();
            //   die;


            $res=$this->connection->query($sql);
            if($res->num_rows == 0) {
                return  true;
            }else{
                $this->errors[]="Email already submit";
            }
        }
        public function showError() {
            foreach ($this ->errors as $error) {
              


                echo $error;
                echo'<br>';
              }
        }
    }
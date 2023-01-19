<?php
    require_once '../app/models/connection.php';
    class Users extends Connection{
        public function validate($email){

          $conn = $this->connect();
          $stm = $conn->prepare('SELECT *FROM  user WHERE email = :email'); 
          $stm->BindParam(':email',$email);
          $stm->execute();
          $data = $stm->fetchAll();
          if($data){
            return False;
          }else{
            return true;
          }

        }
        public function register($name,$email,$password){

          $conn = $this->connect();
          $stm = $conn->prepare("INSERT INTO `user`(`name`, `email`, `password`) VALUES (:name ,:email ,:pass ) ");
          $stm->BindParam(':name',$name);
          $stm->BindParam(':email',$email);
          $stm->BindParam(':pass',$password);
          $stm->execute();
        }
        public function signin($email){
          $conn = $this->connect();
          $stm = $conn->prepare("SELECT *FROM user WHERE email = :email");
          $stm->BindParam(':email',$email);
          $stm->execute();
          $data = $stm->fetch(PDO::FETCH_OBJ);
          return $data;
        }

    }
?>
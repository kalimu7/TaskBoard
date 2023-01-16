<?php
    require_once '../app/core/Controller.php';
    class User extends Controller{

       public function login(){
             $this->view('Home/login');
        }
        public function sign(){
            $this->view('Home/signup');  
        }
        public function signup(){
            if(isset($_POST['register'])){
                $check = $this->model('Users');
               
                $name = $_POST['Name']; 
                $email = $_POST['Email']; 
                $password = $_POST['password'];
                if(empty($name) || empty($email) || empty($password)){
                    $msg = 'some inputs still be empty';
                    $this->view('Home/signup',['msg' => $msg]);
                    exit;
                }
                $password_hashed = Password_hash($password,PASSWORD_BCRYPT);
                $check->register($name,$email,$password_hashed);
                header('Location:http://localhost/TaskBoard/public/User/login');
                
            }
        }
        public function loginin(){
            if(isset($_POST['login'])){
                $model = $this->model('Users');
                
                $email = $_POST['email']; 
                $password = $_POST['password']; 
                if(empty($email) || empty($password)){
                    $msg = 'some inputs still be empty';
                    $this->view('Home/login',['msg' => $msg]);
                    exit;
                }
                $data = $model->signin($email);
                if(password_verify($password,$data->password)){
                    $_SESSION['login'] = true;
                    $_SESSION['id_user'] = $data->id;
                    $_SESSION['name'] = $data->name;
                    $_SESSION['email'] = $data->email;
                    header('Location:http://localhost/Hotel/public/User/tasks');
                }else{
                    $msg = 'there is something doesnt match';
                    $this->view('Home/login',['msg' => $msg]);
                }
            }
        }
        
    }


?>
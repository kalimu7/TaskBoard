<?php

    require_once '../app/core/Controller.php';
    class Tasks extends controller{

        public function show(){
            $this->view('crud/tasks');
        }
        public function AddTasks(){
            if(isset($_POST['submit'])){
                $name = $_POST['Tname'];
                $description = $_POST['Tdescription'];
                $status = $_POST['Tstatus'];
                $deadline = $_POST['Tdeadline'];
                $model = $this->model('dealTasks');
                if(empty($name) || empty($description) || empty($status) || empty($deadline)){
                    // $model = $this->model('dealTasks');
                    $msg = 'Please fill all the inputs fields';
                    // $data = $model->fetchTach();
                    // $data += ['msg' => '$Please fill all the inputs fields'];
                    // $this->view('crud/tasks',$data);
                    // $this->view('crud/tasks',['msg' => $msg]);
                    $_SESSION['msg'] = $msg;
                    $_SESSION['msg1'] = '';
                    header('Location:http://localhost/TaskBoard/public/Tasks/fetch');
                    exit;
                }
                // $model = $this->model('dealTasks');
                $userid = $_SESSION['id_user'];
                $model->AjouterTache($name,$description,$status,$deadline,$userid);
                $msg = 'New Task added successfully';
                $_SESSION['msg1'] = $msg;
                $_SESSION['msg'] = '';
                header('Location:http://localhost/TaskBoard/public/Tasks/fetch');
                // $this->view('crud/tasks',['msg1' => $msg]);
                // $data = $model->fetchTach();
                // $data += ['msg1' => $msg];
                // $this->view('crud/tasks',$data);
            }
        }
        public function fetch(){
            $model = $this->model('dealTasks');
            $data = $model->fetchTach();
            $this->view('crud/tasks',$data);
        }
        public function update(){
            if(isset($_POST['name'])){
                $name= $_POST['name'];
                $desc= $_POST['desc'];
                $deadline= $_POST['deadline'];
                $status = $_POST['sts'];
                $id = $_POST['id'];
                // echo 'name is '.$name.' description is '.$desc.' deadline is '.$deadline.' and the id '.$id;
                $model = $this->model('dealTasks');
                $check = $model->modifier($name,$desc,$deadline,$status,$id);
                $data = $model->fetchTach();
                
                    
            }
        }
        public function delete($id){
            $model = $this->model('DealTasks');
            $model->remove($id);
            header('Location:http://localhost/TaskBoard/public/Tasks/fetch');
        }
        
    } 

?>
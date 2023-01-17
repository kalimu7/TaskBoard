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
                if(empty($name) || empty($description) || empty($status) || empty($deadline)){
                    $msg = 'Please fill all the inputs fields';
                    $this->view('crud/tasks',['msg' => $msg]);
                    exit;
                }
                $model = $this->model('dealTasks');
                $model->AjouterTache($name,$description,$status,$deadline);
                $msg = 'New Task added successfully';
                $this->view('crud/tasks',['msg1' => $msg]);
            }
        }
        public function fetch(){
            $model = $this->model('dealTasks');
            $data = $model->fetchTach();
            $this->view('crud/tasks');
        }
        
    } 

?>
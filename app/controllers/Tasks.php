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
                    $data = $model->fetchTach();
                    $data += ['msg' => '$Please fill all the inputs fields'];
                    $this->view('crud/tasks',$data);
                    // $this->view('crud/tasks',['msg' => $msg]);
                    exit;
                }
                // $model = $this->model('dealTasks');
                $model->AjouterTache($name,$description,$status,$deadline);
                $msg = 'New Task added successfully';
                // $this->view('crud/tasks',['msg1' => $msg]);
                $data = $model->fetchTach();
                $data += ['msg1' => $msg];
                $this->view('crud/tasks',$data);
            }
        }
        public function fetch(){
            $model = $this->model('dealTasks');
            $data = $model->fetchTach();
            $this->view('crud/tasks',$data);
        }
        
    } 

?>
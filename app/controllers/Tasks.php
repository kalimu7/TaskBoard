<?php

    require_once '../app/core/Controller.php';
    class Tasks extends controller{

        public function show(){
            $this->view('crud/tasks');
        }
        public function AddTasks(){
            if(isset($_POST['submit'])){
                $i = $_POST['Tnumbers']; 
                // die(print($i));
                $name = $_POST['Tname1'];
                $description = $_POST['Tdescription1'];
                $status = $_POST['Tstatus1'];
                $deadline = $_POST['Tdeadline1'];
                $model = $this->model('dealTasks');
                if(empty($name) || empty($description) || empty($status) || empty($deadline)){
                    $msg = 'Please fill all the inputs fields';  
                    $_SESSION['msg'] = $msg;
                    $_SESSION['msg1'] = '';
                    header('Location:http://localhost/TaskBoard/public/Tasks/fetch');
                    exit;
                }
                if($i == 1){
                    $userid = $_SESSION['id_user'];
                    $model->AjouterTache($name,$description,$status,$deadline,$userid);
                }else{
                    $j = 1;
                    while($j<=$i){
                        $userid = $_SESSION['id_user'];
                        $name = $_POST['Tname'.$j];
                        $description = $_POST['Tdescription'.$j];
                        $status = $_POST['Tstatus'.$j];
                        $deadline = $_POST['Tdeadline'.$j];
                        $model->AjouterTache($name,$description,$status,$deadline,$userid);
                        $j++;
                    }
                }
                // $model = $this->model('dealTasks');
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
            $iduser = $_SESSION['id_user'];
            $model = $this->model('dealTasks');
            $data = $model->fetchTach($iduser);
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
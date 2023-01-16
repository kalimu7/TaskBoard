<?php

    require_once '../app/core/Controller.php';
    class Tasks extends controller{

        public function show(){
            $this->view('crud/tasks');
        }
        
    } 

?>
<?php

require_once '../app/models/connection.php';
class DealTasks extends Connection{

    public function AjouterTache($name,$description,$status,$deadline){
        $conn = $this->connect();
        $stm = $conn->prepare('INSERT INTO `tasks`(`name`, `description`, `deadline`, `status`) VALUES ( :name,:description ,:deadline ,:status )');
        $stm->BindParam(':name',$name);
        $stm->BindParam(':description',$description);
        $stm->BindParam(':status',$status);
        $stm->BindParam(':deadline',$deadline);
        $stm->execute();
    }
    public function fetchTach(){
        $conn = $this->connect();
        $stm = $conn->prepare('SELECT * FROM `tasks`');
        $stm->execute();
        // $count = $stm->rowCount();
        $data = $stm->fetchAll();
        return $data;
    }

}

?>
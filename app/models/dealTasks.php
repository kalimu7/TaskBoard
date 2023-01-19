<?php

require_once '../app/models/connection.php';
class DealTasks extends Connection{

    public function AjouterTache($name,$description,$status,$deadline,$userid){
        $conn = $this->connect();
        $stm = $conn->prepare('INSERT INTO `tasks`(`name`, `description`, `deadline`, `status`,`userid`) VALUES ( :name,:description ,:deadline ,:status , :userid)');
        $stm->BindParam(':name',$name);
        $stm->BindParam(':description',$description);
        $stm->BindParam(':status',$status);
        $stm->BindParam(':deadline',$deadline);
        $stm->BindParam(':userid',$userid);
        $stm->execute();
    }
    public function fetchTach(){
        $conn = $this->connect();
        $stm = $conn->prepare('SELECT * FROM `tasks` ORDER BY deadline ASC');
        $stm->execute();
        // $count = $stm->rowCount();
        $data = $stm->fetchAll();
        return $data;
    }
    public function modifier($name,$description,$deadline,$status,$id){
        $conn = $this->connect();
        $stm = $conn->prepare('UPDATE tasks SET  name = :name , description = :desc , deadline =  :deadline , status = :status WHERE id = :id');
        $stm->BindParam(':name',$name);
        $stm->BindParam(':desc',$description);
        $stm->BindParam(':deadline',$deadline);
        $stm->BindParam(':status',$status);
        $stm->BindParam(':id',$id);
        $stm->execute();
    }
    public function remove($id){
        $conn = $this->connect();
        $stm = $conn->prepare('DELETE FROM tasks WHERE id = :id ');
        $stm->BindParam(':id',$id);
        $stm->execute();
    }

}

?>
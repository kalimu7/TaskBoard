<?php

    class Connection{
        
        public $servername="localhost";
        public $username="root";
        public $password="";
        public $dbname="TaskBoard";
        public function connect(){  
        try{
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo 'Connection Failed'.$e->getMessage();
        }
    }

    }


?>
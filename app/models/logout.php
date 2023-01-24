<?php

    class Logout{
        public function Logout(){
            
        $_SESSION = [];
        session_unset();
        session_destroy();
        // header("Location:http://localhost/TaskBoard/public/user/sign");
        }
        
    }
    
?>
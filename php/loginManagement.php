<?php
    function GetEmail(){
        if(isset($_SESSION['email'])){
                return $_SESSION['email'];
             } 
        else return ""; 
    }

    function LogOut(){
        session_start();
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) { 
            setcookie(session_name(), '', time()-42000, '/'); 
        }
        session_destroy();
    }
?>
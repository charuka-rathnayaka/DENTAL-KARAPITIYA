<?php
 session_start();
 include("config_registration.php");
 include("config_login.php");
 include("database_server.php");
 $errors=array();


 if (isset($_POST['Next'])){
     register_form_1();
       
 }

 if (isset($_POST['register'])){
        register_form_2();
    }

if(isset($_POST['login'])){
    login_form();
}

if (isset($_POST['add_doctor'])){
    add_doctor_form();
      
}

if (isset($_GET['logout'])){
        session_destroy();
        
        header('location: index.php');
}






?>
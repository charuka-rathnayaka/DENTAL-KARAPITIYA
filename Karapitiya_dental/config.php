<?php
 session_start();
 
 include("user_management.php");
 
 $errors=array();


 if (isset($_POST['Next'])){
     //register_form_1();
     if(empty($_POST["Firstname"])){
        array_push($errors,"Firstname is required");
    }
    if(empty($_POST['Lastname'])){
        array_push($errors,"Lastname is required");
    }
    if(empty($_POST['Email'])){
        array_push($errors,"Email is required");
    }
    if(empty($_POST['Birthday'])){
        array_push($errors,"Birthday is required");
    }if(empty($_POST['Gender'])){
        array_push($errors,"gender is required");
    }
    if(count($errors)==0){
        $_SESSION["Firstname"]=$_POST["Firstname"];
        $_SESSION["Lastname"]=$_POST['Lastname'];    
        $_SESSION["Email"]=$_POST['Email'];    
        $_SESSION["birthday"]=$_POST['Birthday'];    
        $_SESSION["gender"]=$_POST['Gender'];    
        header('location: registration2.php');
    }
       
 }

 if (isset($_POST['register'])){
    if(empty($_POST["password1"])){
        array_push($errors,"Password is required");
    }if(empty($_POST["password2"])){
        array_push($errors,"Password confirmation is required");
    }
    if($_POST["password1"]!=$_POST["password2"]){
        array_push($errors,"Passwords does not match");
    }
    $username=$_POST["username"];
    $sql_query0="SELECT * FROM `patient_accounts` WHERE `Username`='$username'";
    $checkusername=mysqli_query($database,$sql_query0);
    if(mysqli_num_rows($checkusername)>0){
        array_push($errors,"That Username already exists");
    }
    if(count($errors)==0){
        $user_manage=new Manage_user();
        $user=$user_manage->register_patient($_SESSION["Firstname"],$_SESSION["Lastname"],$_SESSION["Email"],$_SESSION["birthday"],$_SESSION["gender"],$_POST["username"],$_POST["password"]);
        if ($user=="patient"){
            $SESSION["user_type"]=$user;
            header('location: index.php');
        }
        else{
            array_push($errors,"Error occured");

        }

        }
    }

if(isset($_POST['login'])){
    if (empty($_POST["username"])){
        array_push($errors,"Please enter Username");
    }
    if (empty($_POST["password"])){
        array_push($errors,"Please enter password");
    }
    if(count($errors) == 0 ){
        $user_manage=new Manage_user();
        $user=$user_manage->login_user($_POST["username"],$_POST["password"]);
        $SESSION["user_type"]=$user;
        if ($user=="admin"){
            header('location: index_admin.php');
        }
        else if ($user=="staff"){
            header('location: index_staff.php');
        }
        else if ($user=="patient"){
            header('location: index.php');
        }
        else if ($user=="doctor"){
            header('location: index_doctor.php');
        }
        else{
            array_push($errors,"Username and Password are incorrect");
        }
}
}

if (isset($_POST['add_doctor'])){
    if(empty($_POST["Reg_Num"])){
        array_push($errors,"Registration number is required");
    }
    if(empty($_POST["Firstname"])){
        array_push($errors,"Firstname is required");
    }
    if(empty($_POST['Lastname'])){
        array_push($errors,"Lastname is required");
    }
    if(empty($_POST['Email'])){
        array_push($errors,"Email is required");
    }
    if(empty($_POST['Birthday'])){
        array_push($errors,"Birthday is required");
    }if(empty($_POST['Gender'])){
        array_push($errors,"gender is required");
    }
    if(empty($_POST["Qualifications"])){
        array_push($errors,"Qualifications are required");
    }
    if(empty($_POST["username"])){
        array_push($errors,"Username is required");
    }
    
    if(empty($_POST["password1"])){
        array_push($errors,"Password is required");
    }if(empty($_POST["password2"])){
        array_push($errors,"Password confirmation is required");
    }
    if($_POST["password1"]!=$_POST["password2"]){
        array_push($errors,"Passwords does not match");
    }
    $username=$_POST["username"];
    $sql_query5="SELECT * FROM `doctor_accounts` WHERE `Username`='$username'";
    $check_username=mysqli_query($database,$sql_query5);
    if(mysqli_num_rows($check_username)>0){
        array_push($errors,"That Username already exists");
    }
    if(count($errors)==0){
        $password=md5($_POST["password1"]);
        $user_manage=new Manage_user();
        $user=$user_manage->register_doctor($_POST["Reg_Num"],$_POST["Firstname"],$_POST["Lastname"],$_POST['Email'],$_POST['Birthday'],$_POST['Gender'],$_POST['Qualifications'],$_POST["username"],$password);
        header("location:index_admin.php");
    }
      
}

if (isset($_GET['logout'])){
        session_destroy();
        
        header('location: index.php');
}






?>
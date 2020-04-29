<?php

//include("database_server.php");
$Firstname='';
 $Lastname='';
 $Email='';
 $password1='';
 $password2='';
 $Birthday='';
 $Gender="";
function register_form_1(){
    global $errors;

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

function register_form_2(){
    include("database_server.php");
    global $errors;
    
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
$sql_query0="SELECT * FROM `patient_accounts` WHERE `Username`='$username'";
$checkusername=mysqli_query($database,$sql_query0);
if(mysqli_num_rows($checkusername)>0){
    array_push($errors,"That Username already exists");
}

if(count($errors)==0){
    $Firstname=$_SESSION["Firstname"];
    $Lastname=$_SESSION["Lastname"];
    $Email=$_SESSION["Email"];
    $Birthday=$_SESSION["birthday"];
    $Gender=$_SESSION["gender"];
    
    
    $password=md5($_POST["password1"]);
    $sql_query1="INSERT INTO `patient_accounts` ( `Firstname`, `Lastname`, `Email`, `Birthday`, `Gender`, `Username`, `Password`) VALUES ('$Firstname', '$Lastname', '$Email', '$Birthday', '$Gender', '$username','$password')";
    mysqli_query($database,$sql_query1);
    $_SESSION["username"]=$username;    
    $_SESSION['success']="Now you are logged in"; 
    header('location: index.php');

}  
}

function add_doctor_form(){
    include("database_server.php");
    global $errors;
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
        $Reg_Num=$_POST["Reg_Num"];
        $Firstname=$_POST["Firstname"];
        $Lastname=$_POST['Lastname'];
        $Email=$_POST['Email'];
        $Birthday=$_POST['Birthday'];
        $Gender=$_POST['Gender'];
        $Qualifications=$_POST['Qualifications'];
        $password=md5($_POST["password1"]);
    $sql_query1="INSERT INTO `doctor_accounts` ( `Reg_Num`,`Firstname`, `Lastname`, `Email`, `Gender`, `Birthday`, `Qualifications`, `Username`, `Password`) VALUES ('$Reg_Num','$Firstname', '$Lastname', '$Email', '$Gender', '$Birthday','$Qualifications', '$username','$password')";
    mysqli_query($database,$sql_query1);   
    $_SESSION['success']="Now doc added"; 
    header('location: index_admin.php');


}

}


?>
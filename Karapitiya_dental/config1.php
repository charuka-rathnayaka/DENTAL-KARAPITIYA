<?php
    session_start();
    $database=mysqli_connect('localhost','root','','registration');
    $Firstname='';
    $Lastname='';
    $Email='';
    $password1='';
    $password2='';
    $birthday='';
    $gender='';
    $errors=array();
    

    if (isset($_POST['Next'])){
        $Firstname=$_POST['Firstname'];
        $Lastname=$_POST['Lastname'];
        $Email=$_POST['Email'];
        $birthday=$_POST['birthday'];
        $gender=$_POST['gender'];
    
    if(empty($Firstname)){
        array_push($errors,"Firstname is required");
    }
    if(empty($Lastname)){
        array_push($errors,"Lastname is required");
    }
    if(empty($Email)){
        array_push($errors,"Email is required");
    }
    if(empty($birthday)){
        array_push($errors,"Birthday is required");
    }if(empty($gender)){
        array_push($errors,"gender is required");
    }
    
    if(count($errors)==0){
       
        $_SESSION["Firstname"]=$Firstname;
        $_SESSION["Lastname"]=$Lastname;    
        $_SESSION["Email"]=$Email;    
        $_SESSION["birthday"]=$birthday;    
        $_SESSION["gender"]=$gender;        
      
        header('location: registration2.php');

    }  }
    
    
    //----------------------------
    if (isset($_POST['register'])){
        $username=$_POST['username'];
        
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];
    
    if(empty($username)){
        array_push($errors,"Username is required");
    }
    
    if(empty($password1)){
        array_push($errors,"Password is required");
    }if(empty($password2)){
        array_push($errors,"Password confirmation is required");
    }
    if($password1!=$password2){
        array_push($errors,"Passwords does not match");
}
    $sql_query0="SELECT * FROM `user_accounts` WHERE `Username`='$username'";
    $checkusername=mysqli_query($database,$sql_query0);
    if(mysqli_num_rows($checkusername)>0){
        array_push($errors,"That Username already exists");
    }
    
    if(count($errors)==0){
        $Firstname=$_SESSION["Firstname"];
        $Lastname=$_SESSION["Lastname"];    
        $Email=$_SESSION["Email"];    
        $birthday=$_SESSION["birthday"];    
        $gender=$_SESSION["gender"];        
      
        
        $password=md5($password1);
        $sql_query1="INSERT INTO `user_accounts` ( `Firstname`, `Lastname`, `Email`, `Birthday`, `Gender`, `Username`, `Password`) VALUES ('$Firstname', '$Lastname', '$Email', '$birthday', '$gender', '$username','$password')";
        mysqli_query($database,$sql_query1);
        $_SESSION["username"]=$username;    
        $_SESSION['success']="Now you are logged in"; 
        header('location: index.php');

    }  
    }


    //----------------------------

    if(isset($_POST['login'])){
        $username=$_POST["username"];
        $pass=$_POST["password"];
       
     
        if (empty($username)){
            array_push($errors,"Please enter Username");
        }
        if (empty($pass)){
            array_push($errors,"Please enter password");
        }

        if(count($errors) == 0 ){
        
            $password=md5($pass);
            $sql_query2="SELECT * FROM `user_accounts` WHERE `Username`='$username' AND `password`='$password'";

            $result=mysqli_query($database,$sql_query2);
            
            if(mysqli_num_rows($result)==1){
                $_SESSION["username"]=$username;    
                $_SESSION['success']="Now you are logged in"; 
                header('location: index.php');
                $row = mysqli_fetch_assoc($result);
                $Firstname=$row["Firstname"];
                $_SESSION["Firstname"]=$row["Firstname"];
                $_SESSION["Lastname"]=$row["Lastname"];    
                $_SESSION["Email"]=$row["Email"];    
                $_SESSION["birthday"]=$row["Birthday"];    
                $_SESSION["gender"]=$row["Gender"];  

            }
            else{
                array_push($errors,"Username and Password are incorrect");
                header('location:login.php');
                        }
        }
       
        }
    
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION["Firstname"]);
        header('location: index.php');
    }
?>
<?php
//include("database_server.php");
$errors=array();


function login_form(){
    global $errors;
    global $database;
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
            $sql_query7="SELECT * FROM `staff_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_staff=mysqli_query($database,$sql_query7);
            if((mysqli_num_rows($result_staff)>0) && ($username=="admin")){
                $_SESSION["username"]=$username;
                header('location: index_admin.php');
            }
            elseif((mysqli_num_rows($result_staff)>0) && ($username=="staff")){
                $_SESSION["username"]=$username;
                header('location: index_staff.php');
            }
            else{
           
            $sql_query3="SELECT * FROM `doctor_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_doctor=mysqli_query($database,$sql_query3);
            $sql_query2="SELECT * FROM `patient_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_patient=mysqli_query($database,$sql_query2);
            if(mysqli_num_rows($result_doctor)>0){
                $_SESSION["username"]=$username;    
                $_SESSION['success']="WELCOME DOCTOR"; 
                header('location: index_doctor.php');
                $row = mysqli_fetch_assoc($result_doctor);
                
                $_SESSION["Reg_Num"]=$row["Reg_Num"];
                $_SESSION["Firstname"]=$row["Firstname"];
                $_SESSION["Lastname"]=$row["Lastname"];    
                $_SESSION["Email"]=$row["Email"];    
                $_SESSION["birthday"]=$row["Birthday"];    
                $_SESSION["gender"]=$row["Gender"];
                $_SESSION["Qualifications"]=$row["Qualifications"];  

            }
            else if(mysqli_num_rows($result_patient)>0){
                $_SESSION["username"]=$username;    
                $_SESSION['success']="Now you are logged in Patient"; 
                header('location: index.php');
                $row = mysqli_fetch_assoc($result_patient);
                $Firstname=$row["Firstname"];
                $_SESSION["Firstname"]=$row["Firstname"];
                $_SESSION["Lastname"]=$row["Lastname"];    
                $_SESSION["Email"]=$row["Email"];    
                $_SESSION["birthday"]=$row["Birthday"];    
                $_SESSION["gender"]=$row["Gender"];  
            }
        

            
            else{
                array_push($errors,"Username and Password are incorrect");
                //header('location:login.php');
                        }
        }
    }
}


?>
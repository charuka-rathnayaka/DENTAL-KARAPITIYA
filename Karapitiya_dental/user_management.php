<?php
include_once("database_server.php");
class Manage_user{
   
    public $database;
    public $errors=array();
    public $user_type='not_logged';
    function __construct(){
    $db_connect=new Db_Connection();
    $this->database=$db_connect->connect();
}

function login_user($username,$pass){
            $password=md5($pass);
            $sql_query7="SELECT * FROM `staff_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_staff=mysqli_query($this->database,$sql_query7);
            if((mysqli_num_rows($result_staff)>0) && ($username=="admin")){
                $_SESSION["username"]=$username;
                $user_type="admin";
                return $user_type;
            }
            elseif((mysqli_num_rows($result_staff)>0) && ($username=="staff")){
                $_SESSION["username"]=$username;
                $user_type="staff";
                return $user_type;
            }
            else{
           
            $sql_query3="SELECT * FROM `doctor_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_doctor=mysqli_query($this->database,$sql_query3);
            $sql_query2="SELECT * FROM `patient_accounts` WHERE `Username`='$username' AND `password`='$password'";
            $result_patient=mysqli_query($this->database,$sql_query2);
            if(mysqli_num_rows($result_doctor)>0){
                $_SESSION["username"]=$username;    
                $_SESSION['success']="WELCOME DOCTOR"; 
                $user_type="doctor";
                return $user_type;
            }
            else if(mysqli_num_rows($result_patient)>0){
                $_SESSION["username"]=$username;    
                $_SESSION['success']="Now you are logged in Patient"; 
                $user_type="patient";
                return $user_type;
               
            }       
        
    }
}
function register_patient($Reg_Num,$Firstname,$Lastname,$Email,$Birthday,$Gender,$Username,$pass){
    $password=md5($pass);
    $sql_query1="INSERT INTO `patient_accounts` ( `Firstname`, `Lastname`, `Email`, `Birthday`, `Gender`, `Username`, `Password`) VALUES ('$Firstname', '$Lastname', '$Email', '$Birthday', '$Gender', '$Username','$password')";
    mysqli_query($this->database,$sql_query1);
    $_SESSION["username"]=$Username;    
    $_SESSION['success']="Now you are logged in"; 
    $user_type="patient";
    return $user_type;

}
function register_doctor($Reg_Num,$Firstname,$Lastname,$Email,$Birthday,$Gender,$Qualifications,$Username,$password){
    $sql_query1="INSERT INTO `doctor_accounts` ( `Reg_Num`,`Firstname`, `Lastname`, `Email`, `Gender`, `Birthday`, `Qualifications`, `Username`, `Password`) VALUES ('$Reg_Num','$Firstname', '$Lastname', '$Email', '$Gender', '$Birthday','$Qualifications', '$Username','$password')";
    mysqli_query($this->database,$sql_query1);   
    //$_SESSION['success']="Now doc added"; 
}
}

?>
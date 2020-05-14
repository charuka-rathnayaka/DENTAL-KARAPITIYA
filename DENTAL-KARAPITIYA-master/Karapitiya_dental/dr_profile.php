<?php
include_once("database_server.php");
$db_connect=new Db_Connection();
$database=$db_connect->connect();
$username=$_SESSION["username"];
$sql_query11="SELECT * FROM `doctor_accounts` WHERE `Username`='$username'";
$result=mysqli_query($database,$sql_query11);
$row = mysqli_fetch_assoc($result);
$Reg_Num=$row["Reg_Num"];
$Firstname=$row["Firstname"];
$Lastname=$row["Lastname"];
$Email=$row["Email"];
$Birthday=$row["Birthday"];
$Gender=$row["Gender"];
$Qualifications=$row["Qualifications"];

?>
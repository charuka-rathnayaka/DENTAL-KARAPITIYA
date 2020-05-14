<?php
include_once("database_server.php");
$db_connect=new Db_Connection();
$database=$db_connect->connect();
$username=$_SESSION["username"];
$sql_query10="SELECT * FROM `patient_accounts` WHERE `Username`='$username'";
$result=mysqli_query($database,$sql_query10);
$row = mysqli_fetch_assoc($result);
$Firstname=$row["Firstname"];
$Lastname=$row["Lastname"];
$Email=$row["Email"];
$Birthday=$row["Birthday"];
$Gender=$row["Gender"];
?>
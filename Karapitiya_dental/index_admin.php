<?php include('config.php');

if ($_SESSION["username"]!="admin"){
    header("location:login.php");
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href=stylesheet_home.css>
    </head>

    <body>
        <div class="header">
            <h2>DENTAL UNIT - KARAPITIYA TEACHING HOSPITAL</h2>
            
        </div>
        <div class="navbar">
            <a href="index_admin.php">Home</a>
            
            <div class="dropdown">
                <button class="dropbtn">Edit Treatments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="basic_treatments.php">Edit Basic Treatments</a>
                <a href="advance_treatments.php">Edit Advance Treatments</a>   
            </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Edit Appointments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="today_appointments.php">Today Appointments</a>
                <a href="past_appointments.php">Past Appointments</a>   
            </div>
            </div>
    
            <a href="about_us.php">Edit About</a>
            <a href="contact_us.php">Edit Contact</a>
            <a href="add_doctor.php">Add Doctor</a>
            <a href="#">Edit Clinical Calendar</a>
            </div>
        <div class="content">
            <?php if(isset($_SESSION["success"])):?>
                <div class="success">
                    <h3>
                        <?php
                        echo $_SESSION["success"];
                        unset($_SESSION["success"]);
                        ?>
                    </h3>
                </div>
                <?php endif ?>
            <?php 
                if (isset($_SESSION['username'])):
                ?>
                <div class="welcome">
                    <p>WELCOME <strong> <?php echo $_SESSION['username']; ?></strong>
                    
                </p>
                <p> <a href='index.php?logout='1' ' style="color:red;">Logout</a></p>
                </div>
               
                <?php endif ?>
                <?php 
                if(!isset($_SESSION['username'])): ?>
                <div class="welcome">
                    
                <p> <a href='login.php' style="color:blue;">Login</a></p>
                </div>
                <?php endif ?>
                
            </div>

    </body>
</html>
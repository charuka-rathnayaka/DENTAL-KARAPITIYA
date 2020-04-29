<?php include('config.php');

if ($_SESSION['username']!="staff"){
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
            <a href="index_staff.php">Home</a>
            
            <div class="dropdown">
                <button class="dropbtn">Treatments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="basic_treatments.php">Basic Treatments</a>
                <a href="advance_treatments.php">Advance Treatments</a>   
            </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Appointments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="add_new_appointment.php">Make new Appointment</a>
                <a href="view_today_appointments.php">View today Appointments</a>   
            </div>
            </div>
            <a href="contact_us.php">Today Appointment</a>
            <a href="contact_us.php">Contact details</a>
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
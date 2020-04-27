<?php include('config1.php'); 
if (empty($_SESSION['username'])){
    header("location:login.php");
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <link rel="stylesheet" type="text/css" href=stylesheet_my_profile.css>
    </head>
    <body>
    <div class="header">
            <h2>DENTAL UNIT - KARAPITIYA TEACHING HOSPITAL</h2>
            
        </div>
        
        <div class="navbar">
            <a href="index.php">Home</a>
            
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
                <a href="view_my_appointment.php">View My Appointments</a>   
            </div>
            </div>
            <a href="my_profile.php">My Profile</a>
            <a href="about_us.php">About</a>
            <a href="contact_us.php">Contact</a>
            </div>

            <div class="log">
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
                
                <p> <a href="index.php?logout='1' "style="color:red;">Logout</a></p>
                </div>
               
    
               
                <?php endif ?>
                <?php 
                if(!isset($_SESSION['username'])): ?>
                <div class="welcome">
                    
                <p> <a href='login.php'style="color:blue;">Login</a></p>
                </div>
                <?php endif ?>
            </div>

            <div class="content">
            <div class="topic"><h3>My Profile</h3></div>
            <br>
            <div class="input-data">
                <label>Firstname:</label>
            
                <label><?php echo $_SESSION["Firstname"]; ?></label>
                
            </div>
            <div class="input-data">
                <label>Lastname:</label>
                <label><?php echo $_SESSION["Lastname"]; ?></label>
                
            </div>
            <div class="input-data">
                <label>Email:</label>
                <label><?php echo $_SESSION["Email"]; ?></label>
                
            </div>
            <div class="input-data">
                <label>Birthday:</label>
                <label><?php echo $_SESSION["birthday"]; ?></label>
                
            </div>
            <div class="input-data">
                <label>Gender:</label>
                <label><?php echo $_SESSION["gender"]; ?></label>
                
            </div>
            <div class="input-data">
                <label>Dental History:</label>
                
                
            </div>
            
            </div>
           
    </body>
</html>
<?php include('config.php'); 
include('dr_profile.php'); 

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
            <a href="index_doctor.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Appointments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="today_appointments.php">Today Appointments</a>
                <a href="past_appointments.php">Past Appointments</a>   
            </div>
            </div>
            <a href="profile_doctor.php">My Profile</a>
            <a href="personal_blog.php">Blog</a>
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

            <div class="content">
            <div class="topic"><h3>My Profile</h3></div>
            <br>
            <div class="input-data">
                <label>Registration Number</label>
            
                <label><?php echo $Reg_Num; ?></label>
            <div class="input-data">
                <label>Firstname:</label>
            
                <label><?php echo $Firstname; ?></label>
                
            </div>
            <div class="input-data">
                <label>Lastname:</label>
                <label><?php echo $Lastname; ?></label>
                
            </div>
            <div class="input-data">
                <label>Email:</label>
                <label><?php echo $Email; ?></label>
                
            </div>
            <div class="input-data">
                <label>Birthday:</label>
                <label><?php echo $Birthday; ?></label>
                
            </div>
            <div class="input-data">
                <label>Gender:</label>
                <label><?php echo $Gender; ?></label>
                
            </div>
            <div class="input-data">
                <label>Quallifications</label>
                <label><?php echo $Qualifications; ?></label>
                
            </div>
            
            
            </div>
           
    </body>
</html>
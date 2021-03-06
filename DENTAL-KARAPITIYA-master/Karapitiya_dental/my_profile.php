<?php include('config.php'); 
//include('patient_profile.php');
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
            <div id="part1">
            <div class="dropdown">
                <button class="dropbtn">Treatments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="basic_treatments.php">Basic Treatments</a>
                <a href="advance_treatments.php">Advance Treatments</a>  
</div> 
            </div>
            </div>
            <div id="part2">
            <div class="dropdown">
                <button class="dropbtn">Appointments
                    <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content">
                <a href="add_new_appointment.php">Make new Appointment</a>
                <a href="view_my_appointment.php">View My Appointments</a>   </div>
            </div>
            </div>
            <div id="part3">
            <a href="my_profile.php">My Profile</a>
</div>
            <div id="part4">
            <a href="about_us.php">About</a>
            <a href="contact_us.php">Contact</a>
</div>
            </div>
            
           <?php include('user_type_menu.php');
           ?> 

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
                <label>Username :</label>
            
                <label id="Username"></label>
                
            </div>

            <div class="input-data">
                <label>Firstname:</label>
            
                <label id="Firstname"></label>
                
            </div>
            <div class="input-data">
                <label>Lastname:</label>
                <label id="Lastname"></label>
                
            </div>
            <div class="input-data">
                <label>Email:</label>
                <label id="Email"></label>
                
            </div>
            <div class="input-data">
                <label>Birthday:</label>
                <label id="Birthday"></label>
                
            </div>
            <div class="input-data">
                <label>Gender:</label>
                <label id="Gender"></label>
                
            </div>
            <div class="input-data">
                <label>Dental History:</label>
                
                
            </div>
            
            </div>
            <script> 
   
var xmlhttp = new XMLHttpRequest(); 
   
xmlhttp.onreadystatechange = function() { 
    if (this.readyState == 4 && this.status == 200) { 
        myObj = JSON.parse(this.responseText); 
        document.getElementById("Firstname").innerHTML = myObj.Firstname; 
        document.getElementById("Lastname").innerHTML = myObj.Lastname; 
        document.getElementById("Email").innerHTML = myObj.Email; 
        document.getElementById("Birthday").innerHTML = myObj.Birthday; 
        document.getElementById("Gender").innerHTML = myObj.Gender; 
        document.getElementById("Username").innerHTML = myObj.Username; 
    } 
}; 
xmlhttp.open("GET", "patient_profile.php", true); 
xmlhttp.send(); 
   
</script> 
           
    </body>
</html>

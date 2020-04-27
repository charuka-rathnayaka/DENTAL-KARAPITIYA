<?php include("config1.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title> User registration form </title>
        <link rel="stylesheet" type="text/css" href="stylesheet_form.css">
    </head>
    <body>
        <div class="header">
            <h1>Register</h1>

        </div>
        <form method="POST" action="registration1.php">
            <?php include("errors.php");
             ?>            
            <div class="input-group">
                <label>Firstname</label>
                <input type="text" name="Firstname" value="<?php echo $Firstname ?>">
            </div>
            <div class="input-group">
                <label>Lastname</label>
                <input type="text" name="Lastname"value="<?php echo $Lastname ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="Email" value="<?php echo $Email ?>">
            </div>
            <div class="input-group">
                <label>Birthday:</label>
                <input type="date"  name="birthday">
            </div>
            <br>
            <div class="input-data">
                <input type="radio"  name="gender" value="male">
                <label >Male</label><br>
                <input type="radio" name="gender" value="female">
                <label >Female</label><br>
            </div>
            <br>
            <div class="input-group">
                <button type="submit" name="Next" class="btn">Next</button>
            </div>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>


            </form>
        
    </body>
</html>

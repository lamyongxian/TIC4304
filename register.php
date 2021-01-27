<?php
    require_once "config.php";

    $user = $pwd = $pwd_again = $user_err = $pwd_err = $pwd_again_err = "";
     
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            $user_err = "Do not enter user name.";
        } else{
            // check if the user has existed.
            $user = trim($_POST["username"]);
            $sql = "SELECT id FROM users WHERE username = '$user'";
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) == 1) {
                $user_err = "This username is already taken.";
            }
        }
        
        if(empty(trim($_POST["password"]))){
            $pwd_err = "Do not enter password.";     
        } else{
            $pwd = trim($_POST["password"]);
        }
        
        if(empty(trim($_POST["confirm_password"]))){
            $pwd_again_err = "Enter password again.";     
        } else{
            $pwd_again = trim($_POST["confirm_password"]);
            if(empty($pwd_err) && ($pwd != $pwd_again)){
                $pwd_again_err = "The two names are not the same.";
            }
        }
        
        if (!empty($user_err)) {
            echo "<br>";
            echo $user_err;
        }

        if (!empty($pwd_again_err)) {
            echo "<br>";
            echo $pwd_again_err;
        }

        if (!empty($pwd_err)) {
            echo "<br>";
            echo $pwd_err;
        }

        // Please insert your code here.
        
        mysqli_close($link);
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="register.css">

</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="user"><b>User</b></label>
            <input type="text" name="username" class="form-control" value="<?php echo $user; ?>">
      

            <label for="psw"><b>Password</b></label>
            <input type="password" name="password" class="form-control" value="<?php echo $pwd; ?>">
    

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $pwd_again; ?>">
      
            <hr>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </form>    
</body>
</html>
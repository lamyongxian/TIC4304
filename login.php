<?php
    // Please insert your code here.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="register.css">

</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="container">
            <h1>Login</h1>
            <p>Use your name and password to login the website.</p>
            <hr>

            <label for="user"><b>User</b></label>
            <input type="text" name="username" class="form-control" value="<?php echo $user; ?>">
      

            <label for="psw"><b>Password</b></label>
            <input type="password" name="password" class="form-control" value="<?php echo $pwd; ?>">
      
            <hr>

            <button type="submit" class="registerbtn">Login</button>
        </div>

        <div class="container signin">
            <p>Do not have an account? <a href="register.php">Sign up</a>.</p>
        </div>
    </form>    
</body>
</html>
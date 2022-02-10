<?php
    // Please insert your code here.
    require_once "config.php";
    
    $error = $pwd = $user = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["username"]))){
            $error = "Enter user name.";
        } else{
            $user = trim($_POST["username"]);
        }
        
        if(empty(trim($_POST["password"]))){
            $error = "Enter password.";     
        } else{
            $pwd = trim($_POST["password"]);
        }
    

        if (!empty($error)) {
            echo "<br />";
            echo $error;
        }


        function login($user1, $pwd1, $link1) {
            $sql = "SELECT id FROM users WHERE username = '$user1' AND `password` = '$pwd1';";
            $result = mysqli_query($link1, $sql);
            return (mysqli_num_rows($result) == 1);
        }
        

        if (login($user, $pwd, $link)) {
            mysqli_close($link);
            session_start();
            $_SESSION["user"] = $user;
            header("Location: welcome.php");
            die();
        } else {
            echo "Wrong username or password!";
        }

    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        session_start();
        if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
            header("Location: welcome.php");
            die();
        }

    }

    
    mysqli_close($link);

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
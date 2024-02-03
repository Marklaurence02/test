<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">UserName</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit"class="btn" name="submit" value="Login">
                    </div>
                <div class="link">
                    Don't have an account? <a href="Register.php">Sign up now</a>

                </div>
         </form>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST["submit"])){
     $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
     $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

     if ($username == "Mark Laurence" && $password == "12345678"){
         // Correct username and password, redirect to home.php
         header("Location: home.php");
         exit();
     }
     else{
        echo "<script>alert('Wrong Username or Password!')</script>";
     }  

}
?>

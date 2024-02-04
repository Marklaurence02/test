<?php
    session_start();
?>
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
        <?php
include("config.php");
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']); // Change from 'email' to 'username'
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        $_SESSION['VALID'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['age'] = $row['Age'];
        $_SESSION['id'] = $row['Id'];
        $_SESSION['school'] = $row['School'];
        $_SESSION['address'] = $row['Address'];
        header("Location: home.php");
        exit(); // Add exit() after header to stop further execution
    } else {
        echo "<div class='message'>
              <p>Wrong Username or Password</p>
              </div><br>";
        echo "<a href='new.php'><button class='btn'>Go Back</button></a>"; // Corrected the button placement
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add your styles or link to a stylesheet here -->
</head>
<body>
    <header>Login</header>
    <form action="" method="post">
        <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="field">
            <input type="submit" class="btn" name="submit" value="Login">
        </div>

        <div class="link">
            Don't have an account? <a href="Register.php">Sign up now</a>
        </div>
    </form>
</body>
</html>

<?php
} // Closing brace for else
?>

    </div>
</body>
</html>

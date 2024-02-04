<?php
session_start();

include("config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: new.php");
    exit(); // Added exit to stop further execution after redirection
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="Home.php"> Logo</a></p>
        </div>
        <div class="right-links">
            <a href="edit.php">Change Profile</a>
            <a href="new.php"><button class="btn">Log out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['Age']; // Corrected 'Age' to match the input name attribute

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con, "UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id") or die("error occurred"); // Corrected 'or die' message

                if ($edit_query) {
                    echo "<div class='message'>
                            <p>Profile Updated</p>
                          </div><br>";
                    echo "<a href='Home.php'><button class='btn'>Go Home</button></a>";
                }
            } else {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id =$id ");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }
            ?>
                <header>Change Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">UserName</label>
                        <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" required>
                    </div>

                    <div class="field input">
                        <label for="Age">Age</label>
                        <input type="text" name="Age" id="Age" value="<?php echo $res_Age; ?>" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>

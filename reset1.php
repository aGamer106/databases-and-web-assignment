<?php
require 'navbar.php';?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Password</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/reset1.css">
</head>
<body>

    <?php
    require_once 'passwordResetSQL.php';

    $usernameErr = $passwordErr = "";
    $array = "";

    if (isset($_POST['submit'])) {
        if ($_POST["username"]==null) {
            $usernameErr = "Username is required";
        }
        if ($_POST["password"]==null) {
            $passwordErr = "Password is required";
        }

        if($_POST["username"] !=null
            && $_POST['password'] != null)
        {
            $array = resetPassword();
            if ($array != null) {
                $_SESSION['username'] = $array[0]['username'];
                $_SESSION['password'] = $array[0]['password'];
                header("Location: login.php");
                exit();
            }
            else{
                $invalidMesg = "Invalid credentials!";
            }
        }
    }
    ?>

    <div class="container pb-5">
        <main role="main" class="pb-3">
            <form method="post">
                <div class="box">
                    <div class="form">
                        <h2>Reset Password</h2>
                        <div class="input-box">
                            <input type="text" name="username" required>
                            <span><?php echo $usernameErr; ?>Username</span>
                            <i></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" required>
                            <span><?php echo $passwordErr; ?>New Password</span>
                            <i></i>
                        </div>

                        <br>
                        <input type="submit" value="Reset Password" name="submit">
                    </div>
                </div>
            </form>
        </main>
    </div>

</body>
</html>



<?php

require 'footer.php';

?>

<?php
require 'navbar.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logged In</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/reset.css">
    </head>
<body>

<?php

require_once 'passwordResetSQL.php';

$emailErr = $usrnErr = $postcodeErr = $dateErr = "";
$array = "";

if (isset($_POST['submit'])) {
    if ($_POST["email"]==null) {
        $nameErr = "Email Address is required";
    }
    if ($_POST["postcode"]==null) {
        $pwderr = "Postcode is required";
    }
    if ($_POST["username"]==null) {
        $pwderr = "Username is required";
    }
    if ($_POST["datebirth"]==null) {
        $pwderr = "Date of Birth is required";
    }

    if($_POST['email'] != null
        && $_POST["username"] !=null
        && $_POST['datebirth'] != null
        && $_POST['postcode'] != null)
    {
        $array = checkInfo();
        if ($array != null) {
            $_SESSION['email'] = $array[0]['email'];
            $_SESSION['username'] = $array[0]['username'];
            $_SESSION['postcode'] = $array[0]['postcode'];
            $_SESSION['datebirth'] = $array[0]['datebirth'];
            header("Location: reset1.php");
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
                    <span><?php echo $usrnErr; ?>Username</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" name="postcode" required>
                    <span><?php echo $postcodeErr; ?>Postcode</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" name="email" required>
                    <span><?php echo $emailErr; ?>Email Address</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="date" name="datebirth" required>
                    <span><?php echo $dateErr; ?>Date of Birth</span>
                    <i></i>
                </div>
                <br>
                <input type="submit" value="Reset" name="submit">
            </div>
        </div>
        </form>
    </main>
</div>

<?php
require 'footer.php';
?>

</body>
</html>

<?php
    require 'staff-navbar.php';
    include_once 'createUser.php';

session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: staffLogin.php");
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Customer Account</title>
<!--    <link rel="stylesheet" href="style/register.css">-->
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/staff-navbar.css">
    <link rel="stylesheet" href="style/create-customer-by-staff.css">
</head>
<body>

<?php
$errorfname = $errorlname = $errordob = $erroremail =
$errorpostcode = $errorpassword = "";

$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['fname']==""){
        $errorfname = "First name is mandatory";
        $allFields = "no";
    }

    if ($_POST['lname']==""){
        $errorlname = "Last name is mandatory";
        $allFields = "no";
    }

    if ($_POST['datebirth']==""){
        $errordob = "Date of Birth is mandatory";
        $allFields = "no";
    }

    if ($_POST['email']==""){
        $erroremail = "Email is mandatory";
        $allFields = "no";
    }

    if ($_POST['postcode']==""){
        $errorpostcode = "Postcode mandatory";
        $allFields = "no";
    }

    if ($_POST['password']==""){
        $errorpassword = "Password mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createUser = createUser();
        header('Location: userRegistrationResult.php?createUser='.$createUser);
    }
}
?>

<div class="container">
    <div class="header">
        <h1>Create Account on Customer Behalf</h1>
    </div>
    <form method="post">
        <div class="user-details">
            <div class="input-box">
                        <span class="details">
                            First Name
                        </span>
                <input type="text" placeholder="First Name..." name="fname" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Last Name
                        </span>
                <input type="text" placeholder="Last Name..." name="lname" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Date of Birth
                        </span>
                <input type="date" placeholder="Date of Birth" name="datebirth" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Email Address
                        </span>
                <input type="email" placeholder="Email..." name="email" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Postcode
                        </span>
                <input type="text" placeholder="Postcode..." name="postcode" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Password
                        </span>
                <input type="password" placeholder="Password..." name="password" required>
            </div>
            <div class="button">
                <input type="submit" value="Register" name="submit">
            </div>
<!--            <div class="signup-link">-->
<!--                Already have an account ? <a href="login.php">Login here</a>-->
<!--            </div>-->
        </div>
    </form>
</div>

<?php
require 'footer.php';
?>
</body>
</html>

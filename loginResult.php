<?php
    require 'navbar.php';
    include 'session.php';
    $path = 'login.php';

    session_start();
    if(!isset($_SESSION['email'])) {
        session_unset();
        session_destroy();
        header("Location:".$path);
    }

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    checkSession($path);

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
    <link rel="stylesheet" href="style/post-login.css">
    </head>
<body>
<div class="container pb-5">
    <main role="main" class="pb-3">
            <?php
            if(!isset($email) and !isset($password)) {
                echo "Error logging in!";
            }
            else {
                echo '<h2 id="ttl">Good to see you again, '.$email.' !</h2>';
            }
            ?>

        <div class="box">
            <div class="form">
                <div class="menu">
                    <p id="intro">
                    <span>Select Membership Type</span>
                    </p>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Choose...</option>
                    <option value="1">Daily Pass - £5.50</option>
                    <option value="2">Monthly - £13.50</option>
                </select>
                </div>
            </div>
        </div>

        <div>
            <a href="login.php">Back to Login</a>
        </div>
    </main>
</div>

<?php
require 'footer.php';
?>

</body>
</html>

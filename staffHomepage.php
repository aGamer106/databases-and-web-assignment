<?php
 require 'staff-navbar.php';
include 'session.php';
$path = 'staffLogin.php';

session_start();
if(!isset($_SESSION['id'])) {
    session_unset();
    session_destroy();
    header("Location:".$path);
}

$id = $_SESSION['id'];
$pwd = $_SESSION['pwd'];
checkSession($path);
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logged as Staff</title>
</head>
<body>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <?php
        if(!isset($id) and !isset($pwd)) {
            echo "Error logging in!";
        }
        else {
            echo '<h2 id="ttl">Hello again, '.$id.' !</h2>';
        }
        ?>

    </main>
</div>

</body>
</html>

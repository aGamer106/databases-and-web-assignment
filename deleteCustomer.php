<?php

require 'staff-navbar.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: customers.php");
    exit();
}

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$username = $_POST['username'];
$db->query("DELETE FROM Customer WHERE username='$username'");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Customer</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/delete-customer.css">
</head>
<body>
<div class="container">
    <h1><?php echo $username.' successfully deleted!' ?></h1>
    <form action="deleteCustomer.php" method="post">
        <input type="hidden" name="username" value="<?php echo $username; header("Location: customers.php"); ?>">
<!--        <input type="submit" value="&#128465;">-->
    </form>
</div>




<?php
require 'footer.php';
?>

</body>
</html>

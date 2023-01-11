<?php
    require 'staff-navbar.php';
    require 'footer.php';

    session_start();

    if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
        header("Location: staffLogin.php");
        exit();
    }

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$stmt = $db->prepare('');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/staff-navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/payments.css">
    <title>Manage Subscriptions</title>
</head>
<body>




</body>
</html>

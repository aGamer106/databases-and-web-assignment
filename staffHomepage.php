<?php

    require 'staff-navbar.php';
    require 'footer.php';

session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: staffLogin.php");
    exit();
}

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$stmt = $db->prepare('SELECT Auth.id, Auth.pwd, Staff.role, Staff.fname, Staff.lname FROM Auth LEFT JOIN Staff ON Auth.id = Staff.id WHERE Auth.id = :id AND Auth.pwd = :pwd;');
$stmt->bindParam(':id', $_SESSION['id'], SQLITE3_TEXT);
$stmt->bindParam(':pwd', $_SESSION['pwd'], SQLITE3_TEXT);
$stmt->bindParam(':role', $role, SQLITE3_TEXT);
$result = $stmt->execute();
$row = $result->fetchArray();
$role = $row[2];
$fname = $row[3];
$lname = $row[4];

//echo "Welcome back, $fname $lname! You are logged in as a $role.";


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
    <link rel="stylesheet" href="style/staff-homepage.css">
    <title>Logged as Staff</title>
</head>
<body>
<div class="container pb-5">
    <div class="welcome-text">

    <main role="main" class="pb-3">
        <?php
        if(!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
            echo "Error logging in!";
        }
        else {
//            echo '<h2 id="ttl">Welcome back, '.$fname.' '.$lname.'! You are logged in as '.$role.'.</h2>';
            if ($role == 'admin') {
                echo '<h3>Welcome back, '.$fname.' '.$lname.'! You are logged in as an Admin. As an Admin, you have the following privileges:</h3>';
                echo '<ul>';
                echo '<li><span><a href="createStaffAccount.php">Create A Staff Account</a></span></li>';
                echo '<li><span><a href="staff.php">Manage Staff Accounts</span></a></li>';
//                echo '<li><span><a href="payments.php">Manage Payments</a></span></li>';
                echo '</ul>';
            } elseif ($role == 'staff') {
                echo '<h3>Welcome back, '.$fname.' '.$lname.'! You are logged in as a Staff Member. As a Staff Member, you have the following rights:</h3>';
                echo '<ul>';
                echo '<li><a href="customers.php"> Manage Customers</a></li>';
                echo '<li><span><a href="payments.php">Manage Memberships/Payments</a></span></li>';
                echo '<li><span><a href="createCustomerAccount.php">Create Customer Account</a></span></li>';
                echo '</ul>';
            }
        }
        ?>
    </main>
    </div>
</div>

</body>
</html>

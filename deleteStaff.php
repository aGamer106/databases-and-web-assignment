<?php

require 'staff-navbar.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: staff.php");
    exit();
}

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$id = $_POST['id'];
$db->query("DELETE FROM Staff WHERE id='$id'");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Staff Member</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
</head>
<body>
<div class="container">
    <h1><?php echo $id.' successfully deleted!' ?></h1>
    <form action="deleteStaff.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; header("Location: staff.php"); ?>">
        <!--        <input type="submit" value="&#128465;">-->
    </form>
</div>

<?php
require 'footer.php';
?>
</body>
</html>

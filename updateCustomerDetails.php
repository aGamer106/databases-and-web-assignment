<?php
require 'staff-navbar.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: staffLogin.php");
    exit();
}

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$username = $_GET['username'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$datebirth = $_GET['datebirth'];
$email = $_GET['email'];
$postcode = $_GET['postcode'];
$password = $_GET['password'];


if (isset($_POST['submit'])) {
    $stmt = $db->prepare("UPDATE Customer SET fname = ?, lname = ?, datebirth = ?, email = ?, postcode = ?, password = ? WHERE username = ?");
    $stmt->bindValue(1, $_POST['fname']);
    $stmt->bindValue(2, $_POST['lname']);
    $stmt->bindValue(3, $_POST['datebirth']);
    $stmt->bindValue(4, $_POST['email']);
    $stmt->bindValue(5, $_POST['postcode']);
    $stmt->bindValue(6, $_POST['password']);
//    $stmt->bindValue(7, $_POST['membership']);
    $stmt->bindValue(7, $username);
    $result = $stmt->execute();

    if (!$result) {
        echo 'Cannot update user details!';
    }
    else {
        header("Location: customers.php");
    }
}
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
    <link rel="stylesheet" href="style/updateCustomerDetails.css">
    <title>Update Customer Details</title>
</head>
<body>


<?php


?>



<div class="container">
    <div class="header">
        <h1>Update Details</h1>
    </div>
    <form method="post">
        <div class="user-details">
            <div class="input-box">
                        <span class="details">
                            First Name
                        </span>
                <input type="text" placeholder="First Name..." name="fname" value="<?php echo $fname; ?>" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Last Name
                        </span>
                <input type="text" placeholder="Last Name..." name="lname" value="<?php echo $lname; ?>" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Date of Birth
                        </span>
                <input type="date" placeholder="Date of Birth" name="datebirth" value="<?php echo $datebirth; ?>" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Email Address
                        </span>
                <input type="email" placeholder="Email..." name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Postcode
                        </span>
                <input type="text" placeholder="Postcode..." name="postcode" value="<?php echo $postcode; ?>" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Password
                        </span>
                <input type="password" placeholder="Password..." name="password" value="<?php echo $postcode; ?>" required>
            </div>
<!--            <div class="input-box">-->
<!--                        <span class="details">-->
<!--                            Membership Type-->
<!--                        </span>-->
<!--                <input type="text" placeholder="Membership..." name="membership" value="--><?php //echo $membership; ?><!--" required>-->
<!--            </div>-->
<!--            <div class="input-box">-->
<!--                <span class="details">-->
<!--                    Payment Status-->
<!--                </span>-->
<!--                <select id="payment_status" name="payment_status" required>-->
<!--                    <option value="--><?php //echo $payment_status; ?><!--" name="pending">pending</option>-->
<!--                    <option value="--><?php //echo $payment_status; ?><!--" name="active">active</option>-->
<!--                    <option value="--><?php //echo $payment_status; ?><!--" name="suspended">suspended</option>-->
<!--                </select>-->
<!--            </div>-->
            <div class="button">
                <input type="submit" value="Update User Details" name="submit">
            </div>
        </div>
    </form>
</div>

<?php
require 'footer.php';
?>
</body>
</html>

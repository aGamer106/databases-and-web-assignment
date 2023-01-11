<?php
require 'user-navbar.php';
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

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$result = $db->query("SELECT * FROM Customer WHERE email = '$email'");
while ($row = $result->fetchArray()) {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $datebirth = $row['datebirth'];
    $email = $row['email'];
    $postcode = $row['postcode'];
    $password = $row['password'];
    $username = $row['username'];
}



if (isset($_POST['submit'])) {
    $stmt = $db->prepare("UPDATE Customer SET fname = ?, lname = ?, datebirth = ?, email = ?, postcode = ?, password = ? WHERE email = ?");
    $stmt->bindValue(1, $_POST['fname']);
    $stmt->bindValue(2, $_POST['lname']);
    $stmt->bindValue(3, $_POST['datebirth']);
    $stmt->bindValue(4, $_POST['email']);
    $stmt->bindValue(5, $_POST['postcode']);
    $stmt->bindValue(6, $_POST['password']);
    $stmt->bindValue(7, $email);
    $result = $stmt->execute();

    if (!$result) {
        echo 'Cannot update user details!';
    } else {
        header("Location: userHomepage.php");
        exit;
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
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/homepage.css">
    <title>Portal</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>My Details</h1>
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
                <input type="password" placeholder="Password..." name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="input-box">
                        <span class="details">
                            Username
                        </span>
                <input type="text" style="background-color:  #666699" placeholder="Username..." name="username" value="<?php echo $username; ?>" readonly required onclick="alert('For security reasons, your username cannot be changed.')">
            </div>
            <div class="button">
                <input type="submit" value="Update Your Details" name="submit">
            </div>
        </div>
    </form>
</div>


<?php
require 'footer.php';
?>
</body>
</html>

<?php
require 'staff-navbar.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: staffLogin.php");
    exit();
}

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
$id = $_GET['id'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$status = $_GET['status'];
$role = $_GET['role'];

if (isset($_POST['submit'])) {
    $stmt = $db->prepare("UPDATE Staff SET fname = ?, lname = ?, email = ?, status = ?, role = ? WHERE id = ?");
    $stmt->bindValue(1, $_POST['fname']);
    $stmt->bindValue(2, $_POST['lname']);
    $stmt->bindValue(3, $_POST['email']);
    $stmt->bindValue(4, $_POST['status']);
    $stmt->bindValue(5, $_POST['role']);
    $stmt->bindValue(6, $id);
    $result = $stmt->execute();

    if (!$result) {
        echo 'Cannot update user details!';
    }
    else {
        header("Location: staff.php");
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
    <title>Update Staff Details</title>
    <link rel="stylesheet" href="style/staff-navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/update-staff.css">
</head>
<body>

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
                            Email Address
                        </span>
                <input type="email" placeholder="Email..." name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-box">
            <span class="details">
                Status
            </span>
                <select name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="input-box">
                        <span class="details">
                            Role
                        </span>
                <select id="role" name="role">
                    <option value="staff" name="staff">staff</option>
                    <option value="admin" name="admin">admin</option>
                </select>
            </div>
            <div class="button">
                <input type="submit" value="Update Staff Details" name="submit">
            </div>
        </div>
    </form>
</div>


<?php
require 'footer.php';
?>
</body>
</html>

<?php
require 'staff-navbar.php';
require 'footer.php';

session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
    header("Location: staffLogin.php");
    exit();
}


function generateStaffID ($fname, $lname){
    $uname = "";

    $uname .= substr($fname, 0, 1);
    $uname .= substr($lname, 0, 1);

    for($i=0; $i<2; $i++){
        $r = rand(1,5);
        $uname .= $r;
    }
    return $uname;
}

function generateStaffPassword($fname, $lname) {
    $pwd = "";

    $pwd .= substr($fname, 0, 1);
    $pwd .= substr($lname, 0, 1);

    for($i=1; $i<5; $i++){
        $pwd .= $i;
    }

    return $pwd;

}


function createStaffAccount()
{
    $db = new SQLite3('C:\\xampp\\data\\miniGym.db');
    $id = generateStaffID($_POST['fname'], $_POST['lname']);
    $pwd = generateStaffPassword($_POST['fname'], $_POST['lname']);
    $created = false;

    // Insert the staff details into the Staff table
    $stmt = $db->prepare('INSERT INTO Staff(id, fname, lname, email, status, role) VALUES (:id, :fname, :lname, :email, :status, :role)');
    $stmt->bindParam(':id', $id, SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':status', $_POST['status'], SQLITE3_TEXT);
    $stmt->bindParam(':role', $_POST['role'], SQLITE3_TEXT);
    $stmt->execute();

    // Insert the generated password and the staff ID into the Auth table
    $stmt = $db->prepare('INSERT INTO Auth(id, pwd) VALUES (:id, :pwd)');
    $stmt->bindParam(':id', $id, SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $pwd, SQLITE3_TEXT);
    $stmt->execute();

    if ($stmt) {
        $created = true;
    }

    return $created;

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
    <link rel="stylesheet" href="style/create-staff.css">
    <title>Create Staff Account</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    if (createStaffAccount()) {
        $pwd = generateStaffPassword($_POST['fname'], $_POST['lname']);
        $db = new SQLite3('C:\\xampp\\data\\miniGym.db');
        $stmt = $db->prepare('INSERT INTO Auth(id, pwd) VALUES (:id, :pwd)');
        $stmt->bindParam(':id', $id, SQLITE3_TEXT);
        $stmt->bindParam(':pwd', $pwd, SQLITE3_TEXT);
        $stmt->execute();
        echo "<p>Staff account created successfully!</p>";
    } else {
        echo "<p>Failed to create staff account.</p>";
    }
}


?>
<div class="container">
    <div class="header">
        <h1>Add Staff Member</h1>
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
                            Email Address
                        </span>
                <input type="email" placeholder="Email..." name="email" required>
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
                <input type="submit" value="Create Staff Account" name="submit">
            </div>
        </div>
    </form>
</div>



</body>
</html>

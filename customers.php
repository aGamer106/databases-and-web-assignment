<?php
    require 'staff-navbar.php';
    session_start();

    if (!isset($_SESSION['id']) || !isset($_SESSION['pwd'])) {
        header("Location: staffLogin.php");
        exit();
    }

$db = new SQLite3('C:\\xampp\\data\\miniGym.db');
    $result = $db->query('SELECT * FROM Customer');
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
    <link rel="stylesheet" href="style/customer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Manage Customers</title>
</head>
<body>

<div class="container">
    <table class="table pink-bg">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Username</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Postcode</th>
            <th scope="col">Password</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($row = $result->fetchArray()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $datebirth = $row['datebirth'];
            $postcode = $row['postcode'];
            $password = $row['password'];
            $username = $row['username'];
            echo '<tr>';
            echo "<td><a href='updateCustomerDetails.php?username=$username&fname=$fname&lname=$lname&datebirth=$datebirth&email=$email&postcode=$postcode&password=$password'>$username</a></td>";
            echo "<td>$fname</td>";
            echo "<td>$lname</td>";
            echo "<td>$email</td>";
            echo "<td>$datebirth</td>";
            echo "<td>$postcode</td>";
            echo "<td>$password</td>";
            echo '<form action="deleteCustomer.php" method="post">';
            echo '<input type="hidden" name="username" value="'.$username.'">';
            echo '<td><button type="submit">&#128465;</button></td>';
            echo '</form>';
            echo '</tr>';
            $i++;
        }
        echo '</tbody>';
        echo '</table>';

        $db->close();
        ?>


<?php
require 'footer.php';
?>

</body>
</html>

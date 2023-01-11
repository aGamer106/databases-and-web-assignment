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
// retrieve the record for the current user from the database
$stmt = $db->prepare("SELECT membership, payment_status FROM Customer WHERE email = ? AND password = ?");
$stmt->bindValue(1, $email);
$stmt->bindValue(2, $password);
$result = $stmt->execute();

// extract the membership and payment_status fields from the record
$user = $result->fetchArray();
$membership = $user['membership'];
$payment_status = $user['payment_status'];


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logged In</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/post-login.css">
    <link rel="stylesheet" href="style/table.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container pb-5">
    <main role="main" class="pb-3">
            <?php
            if(!isset($email) and !isset($password)) {
                echo "Error logging in!";
            }
            else {
                echo '<h2 id="ttl">Good to see you again, '.$email.' !</h2>';
            }

if ($membership === null) {
    echo "<h2>It looks like you don't have any memberships. Choose from the options below</h2>";
    echo '<table class="table table-striped table-dark">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Daily Pass</th>';
    echo '<th scope="col">Monthly</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $i = 1;
    $query = $db->query('SELECT membership FROM Customer');
    while ($i < 2) {
        echo '<tr>';
        echo '<td><button type="submit" class="btn btn-dark"><a href="pay.php?membership=daily">£5.50</a></button> </td>';
        echo '<td><button type="submit" class="btn btn-dark"><a href="pay.php?membership=monthly">£13.50</a></button> </td>';

        echo '</tr>';
        $i++;
        }
        echo '</tbody>';
        echo '</table>';
        } else {
            echo "<h2>Your current membership is: $membership</h2>";
        }

            ?>

    </main>
</div>

<?php
require 'footer.php';
?>

</body>
</html>

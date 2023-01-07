<?php
    require 'navbar.php';
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
    <link rel="stylesheet" href="style/staff-login.css">
    <title>Staff Login</title>
</head>
<body>
    <?php
    require_once 'staffLoginSQL.php';

    $iderr = $pwdErr = "";
    $array_user = "";

    if (isset($_POST['submit'])) {
        if (!isset($_POST['id']) || !isset($_POST['pwd']) || empty($_POST['id']) || empty($_POST['pwd'])) {
            if (!isset($_POST['id']) || empty($_POST['id'])) {
                $iderr = "Email Address is required";
            }
            if (!isset($_POST['pwd']) || empty($_POST['pwd'])) {
                $pwdErr = "Password is required";
            }
        } else {
            $array_user = checkStaff();
            if ($array_user != null) {
                session_start();
                $_SESSION['id'] = $array_user[0]['id'];
                $_SESSION['pwd'] = $array_user[0]['pwd'];
                header("Location: staffHomepage.php");
                exit();
            } else {
                $invalidMesg = "Invalid username or password!";
            }
        }
    }

    ?>
    <div class="center">
        <h1>Staff Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="id" required>
                <span></span>
                <label>Staff Member ID</label>
                <?php echo $iderr?>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Password</label>
                <?php echo $pwdErr?>
            </div>
            <input type="submit" value="Login" name="submit">
        </form>
    </div>

    <?php
    require 'footer.php';
    ?>
</body>


</html>

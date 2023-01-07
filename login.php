<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome back!</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/background.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <?php
    require 'navbar.php';
    require_once 'customerLoginFunction.php';

    $emailerr = $pwderr = "";
    $array_user = "";

    if (isset($_POST['submit'])) {
        if ($_POST["email"]==null) {
            $nameErr = "Email Address is required";
        }
        if ($_POST["password"]==null) {
            $pwderr = "Password is required";
        }

        if($_POST['email'] != null && $_POST["password"] !=null)
        {
            $array_user = verifyUsers();
            if ($array_user != null) {
                session_start();
                $_SESSION['email'] = $array_user[0]['email'];
                $_SESSION['password'] = $array_user[0]['password'];
                header("Location: loginResult.php");
                exit();
            }
            else{
                $invalidMesg = "Invalid username and password!";
            }
        }
    }



    ?>

    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="email" required >
                <span></span>
                <label>Email Address</label>
                <i></i>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
                <i></i>
            </div>
            <div class="password">
                <a href="reset.php"> Forgot Password ? </a>
            </div>
            <div class="button">
                <input type="submit" value="Login" name="submit">
            </div>
            <div class="signup-link">
                Not a member ? <a href="register.php">Create an account</a>
            </div>
            <div class="signup-link">
                 <a href="staffLogin.php">Staff Login</a>
            </div>

        </form>
    </div>


    <?php
    require 'footer.php';
    ?>
</body>
</html>



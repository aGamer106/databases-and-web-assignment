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
    include_once 'customerLoginFunction.php';

    $erroremail = $errorpassword = "";

    $allFields = "yes";

    if(isset($_POST['submit'])) {

        if ($_POST['email']==""){
            $errorpassword = "Email mandatory";
            $allFields = "no";
        }
        if ($_POST['password']==""){
            $errorpassword = "Password mandatory";
            $allFields = "no";
        }

        if($allFields == "yes") {
            $loginCustomer = loginCustomer();
            header('Location: loginResult.php?customerLoginFunction='.$loginCustomer);
        }

    }



    ?>

    <div class="center">
        <h1>Login</h1>
        <form method="post" action="#">
            <div class="txt_field">
                <input type="text" required>
                <label>Email Address</label>
            </div>
            <div class="txt_field">
                <input type="password" required>
                <label>Password</label>
            </div>
            <?php
                if(isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error'] ?>
            </div>
            <?php
                unset($_SESSION['error']);
                }
            ?>

            <div class="password">
                Forgot Password ?<a href="reset.php"></a>
            </div>
            <div class="button">
                <input type="submit" value="Login" name="submit"> <a href="loginResult.php">Login</a>
            </div>
            <div class="signup-link">
                Not a member ? <a href="register.php">Create an account</a>
            </div>

        </form>
    </div>






    <?php
    require 'footer.php';
    ?>
</body>
</html>



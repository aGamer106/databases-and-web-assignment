<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create an account</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/background.css">
    <link rel="stylesheet" href="style/register.css">
    <link rel="stylesheet" href="style/footer.css">
</head>

    <?php
    require 'navbar.php';
    require 'footer.php';
    include_once 'createUser.php';

    $errorfname = $errorlname = $errordob = $erroremail =
    $errorpostcode = $errorpassword = "";

    $allFields = "yes";

    if (isset($_POST['submit'])){

        if ($_POST['fname']==""){
            $errorfname = "First name is mandatory";
            $allFields = "no";
        }

        if ($_POST['lname']==""){
            $errorlname = "Last name is mandatory";
            $allFields = "no";
        }

        if ($_POST['datebirth']==""){
            $errordob = "Date of Birth is mandatory";
            $allFields = "no";
        }

        if ($_POST['email']==""){
            $erroremail = "Email is mandatory";
            $allFields = "no";
        }

        if ($_POST['postcode']==""){
            $errorpostcode = "Postcode mandatory";
            $allFields = "no";
        }

        if ($_POST['password']==""){
            $errorpassword = "Password mandatory";
            $allFields = "no";
        }

        if($allFields == "yes")
        {
            $createUser = createUser();
            header('Location: userRegistrationResult.php?createUser='.$createUser);
        }
    }
    ?>
<body>

    <div class="container">
        <div class="header">
            <h1>Register</h1>
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
                            Date of Birth
                        </span>
                        <input type="date" placeholder="Date of Birth" name="datebirth" required>
                    </div>
                    <div class="input-box">
                        <span class="details">
                            Email Address
                        </span>
                        <input type="email" placeholder="Email..." name="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">
                            Postcode
                        </span>
                        <input type="text" placeholder="Postcode..." name="postcode" required>
                    </div>
                    <div class="input-box">
                        <span class="details">
                            Password
                        </span>
                        <input type="password" placeholder="Password..." name="password" required>
                    </div>
                    <div class="button">
                        <input type="submit" value="Register" name="submit">
                    </div>
                    <div class="signup-link">
                        Already have an account ? <a href="login.php">Login here</a>
                    </div>
                </div>
            </form>
        </div>

</body>

</html>


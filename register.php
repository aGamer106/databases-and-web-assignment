
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create an account</title>
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/background.css">
    <link rel="stylesheet" href="style/register.css">
    <link rel="stylesheet" href="style/footer.css">
</head>

<body>

    <?php
    require 'navbar.php';
    ?>
    <div class="container">
        <div class="header">
            <h1>Register</h1>
        </div>
        <div class="main">
            <form>
                <span>
                    <i></i>
                    <label for="fname"> First Name
                    <input type="text" placeholder="First Name..." name="fname">
                    </label>
                </span><br>
                <span>
                    <i></i>
                    <label for="lname"> Last Name
                    <input type="text" placeholder="Last Name..." name="lname">
                    </label>
                </span><br>
                <span>
                    <i></i>
                    <label for="dob"> Date of Birth
                    <input type="date" placeholder="Date Of Birth..." name="dob">
                    </label>
                </span><br>
                <span>
                    <i></i>
                    <label for="email"> Email Address
                    <input type="text" placeholder="Email Address..." name="email">
                    </label>
                </span><br>
                <span>
                    <i></i>
                    <label for="postcode"> Postcode
                    <input type="text" placeholder="Postcode..." name="postcode">
                    </label>
                </span><br>
                <span>
                    <i></i>
                    <label for="password"> Password
                    <input type="password" placeholder="Password..." name="password">
                    </label>
                </span><br>
                    <button type="submit">Register your account!</button>
            </form>
        </div>
    </div>

<!--    <img src="style/photos/register-background.jpg" id="register-background" alt="">-->




</body>

</html>

<?php
require 'footer.php';
?>
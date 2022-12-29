
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Mini Gym - Home</title>
    <link rel="icon" type="image/x-icon" href="/style/photos/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/table.css">
</head>

<body >


    <video autoplay muted loop id="video">
        <source src="util/videos/background.mp4" type="video/mp4">
    </video>
    <?php
    require 'navbar.php';
    ?>



    <div class="welcome">
        <h1 id="title">Welcome to MiniGym!</h1>
        <p id="quote">Situated in the steel city of Sheffield, we make it easier for you to reach your goals</p>
        <p id="quote">and stay disciplined.</p>
        <p id="quote">Join us today!</p>
        <?php
        require 'membership.php';
        ?>
    </div>



</body>

    <?php
    require 'footer.php';
    ?>

</html>

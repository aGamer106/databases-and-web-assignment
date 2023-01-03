<?php
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

?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Customer Login Result</h2><br>

        <div>
            <?php
            if(!isset($email) and !isset($password)) {
                echo "Error logging in!";
            }
            else {
                echo "Hello User, you are now logged in.";
            }
            ?>
            <div><a href="login.php">Back to Login</a></div>
        </div>
    </main>
</div>

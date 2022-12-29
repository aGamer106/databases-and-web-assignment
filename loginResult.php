<?php

    $result = $_GET['loginCustomer'];

?>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Customer Login Result</h2><br>

        <div>
            <?php
                if($result) {
                    echo "Hello User, you are now logged in.";
                }
                else {
                    echo "Error logging in!";
                }
            ?>
        <div><a href="login.php">Back to Login</a></div>
        </div>
    </main>
</div>
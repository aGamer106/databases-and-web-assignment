<?php

    $result = $_GET['createUser'];

?>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>User Creation Outcome</h2><br>

        <div>
            <?php
                if($result) {
                    echo "Customer successfully created!";
                }
                else {
                    echo "Error";
                }
            ?>
            <div><a href="register.php">Back to registration</a></div>
        </div>
    </main>
</div>


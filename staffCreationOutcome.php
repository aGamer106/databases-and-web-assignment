<?php

    $result = $_GET['createStaffAccount'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Creation Outcome</title>
</head>
<body>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Staff Creation Outcome</h2>

        <div>
            <?php
                if($result) {
                    echo "<p>Staff account created successfully!</p>";
                }
                else {
                    echo "<p>Error</p>";
                }

            ?>
            <div><a href="staff.php">See Staff</a></div>
        </div>


    </main>
</div>


</body>
</html>

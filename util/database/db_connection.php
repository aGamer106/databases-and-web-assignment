<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database Connection</title>
</head>
<body>
<?php

$db = new SQLite3("C:\\xampp\\data\\miniGym.db");

if ($db) {
    echo "miniGym.db - database connection successfully established!";
}

else {
    echo "Can't connect to the database!";
}

?>

<a href="http://localhost:8080/Assignment/index.php">Home</a>

</body>

</html>

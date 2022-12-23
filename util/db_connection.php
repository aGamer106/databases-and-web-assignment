<?php

$db = new SQLite3("C:\\xampp\\data\\miniGym.db");

if ($db) {
    echo "miniGym.db - database connection successfully established!";
}

else {
    echo "Can't connect to the database!";
}

?>
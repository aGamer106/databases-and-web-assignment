<?php

function verifyUsers () {

    if (!isset($_POST['email']) or !isset($_POST['password'])) {
        return null;
    }

    $db = new SQLite3('C:\\xampp\\data\\miniGym.db');
    $stmt = $db->prepare('SELECT username, email, password FROM Customer WHERE email=:email AND password=:password');
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $rows_array = [];

    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }

    return $rows_array;
}
?>



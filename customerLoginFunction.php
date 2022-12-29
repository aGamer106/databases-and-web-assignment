<?php

function loginCustomer()
{
    session_start();

    $db = new SQLite3("C:\\xampp\\data\\miniGym.db");

    $logged = false;

    if (isset($_POST['login'])) {


        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = 'SELECT COUNT as count FROM Customer WHERE `email` = :username
            AND `password` = :password';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        $stmt->bindParam(':password', $password, SQLITE3_TEXT);

        $stmt->execute();

        if ($stmt) {
            $logged = true;
        }

    }
        return $logged;
}
?>



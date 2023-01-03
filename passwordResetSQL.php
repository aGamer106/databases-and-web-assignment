<?php

function checkInfo() {

    if(!isset($_POST['username']) or !isset($_POST['email'])
        or !isset($_POST['postcode']) or !isset($_POST['datebirth'])) {
        return null;
    }

    $db = new SQLite3('C:\\xampp\\data\\miniGym.db');
    $stmt = $db->prepare('SELECT username, postcode, email, datebirth FROM Customer 
                        WHERE username=:username AND postcode=:postcode AND email=:email AND datebirth=:datebirth');
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
    $stmt->bindParam(':datebirth', $_POST['datebirth'], SQLITE3_TEXT);
    $stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);

    $result = $stmt->execute();
    $rows_array = [];

    while($row=$result->fetchArray()) {
        $rows_array[]=$row;
    }
    return $rows_array;
}


function resetPassword() {

    if(!isset($_POST['password'])) {
        return null;
    }

    $db = new SQLite3('C:\\xampp\\data\\miniGym.db');
    $stmt = $db->prepare('UPDATE Customer 
                                SET password = :password
                                WHERE username = :username');
    $stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $rows_array = [];

    while ($row=$result->fetchArray()) {
        $rows_array[] = $row;
    }
    return $rows_array;


}



?>
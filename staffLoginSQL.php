<?php

function checkStaff () {

    if (!isset($_POST['id']) or !isset($_POST['pwd'])) {
        return null;
    }

    $db = new SQLite3('C:\\xampp\\data\\miniGym.db');
    $stmt = $db->prepare('SELECT * FROM Staff LEFT JOIN Auth S on S.id = Staff.id WHERE S.id = :id AND pwd = :pwd;');
    $stmt->bindParam(':id', $_POST['id'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $rows_array = [];

    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }

    return $rows_array;
}
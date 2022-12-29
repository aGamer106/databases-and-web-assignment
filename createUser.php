<?php
//function generateFirstUsername($string)
//{
//    $counter = 0;
//    $result = "";
//    for ($i = 0; $i < strlen($string); $i++) {
//        $counter++;
//        $result .= $string[$i];
//        if ($counter == 3) break;
//    }
//    return $result;
//}
//
//function generateSecondUsername($string)
//{
//    $result = "";
//    $result .= $string % 100;
//    $result .= rand(0, 9);
//    $result .= rand(0, 9);
//    return $result;
//}

function genUsername ($fname, $lname){
    $uname = "";

    $uname .= substr($fname, 0, 3);
    $uname .= substr($lname, 0, 2);

    for($i=0; $i<2; $i++){
        $r = rand(1,5);
        $uname .= $r;
    }
    return $uname;
}

function createUser(){

    $db = new SQLite3("C:\\xampp\\data\\miniGym.db");
    $username = genUsername($_POST['fname'], $_POST['lname']);
    $created = false;
    $sql = 'INSERT INTO Customer(username, fname, lname, datebirth, email, postcode, password) 
                        VALUES (:username, :fname, :lname, :datebirth, :email, :postcode, :password)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':datebirth', $_POST['datebirth'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

    $stmt->execute();


    if($stmt){
        $created = true;
    }

    return $created;
}

?>
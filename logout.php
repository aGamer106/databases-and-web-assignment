<?php


if ($_GET['user'] == "admin") {

    session_start();
    session_destroy();
    header('Location: index.php');
    exit;

} else {

    session_start();
    session_destroy();
    header('Location: index.php');
    exit;

}

?>
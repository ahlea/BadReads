<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    $user = $_SESSION["username"];
    $db_name = "CS344F22BADREADS";
    $db_user = "AHLEA";
    $db_passwd = "Lindsey";
    $title = $_POST['ttl'];
    
    $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
    // //           db location,       user,     passwd,    database
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
        $sql = "DELETE FROM `Likes` WHERE user = '" . $user . "' AND book = '" . $title . "'"; 
        $r = $db->query($sql);
        $sql_insert = "UPDATE `Book Search` SET Added = Added - 1 WHERE Title = '" . $title . "'";
        $r = $db->query($sql_insert);
        echo 'Deleted! <br><br>';
    }
    $sql_insert2 = "SELECT Added FROM `Book Search` WHERE Title = '" . $title . "'";
    $result = $db->query($sql_insert2);
    $numUsers = $result->fetch_assoc();
    echo 'This book was added by ' . $numUsers['Added'] . ' other users.';
    $db->close();
?>
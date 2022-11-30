<?php
    // Report all error information on the webpage
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $db_name = "CS344F22BADREADS";
    $db_user = "AHLEA";
    $db_passwd = "Lindsey";
    $title = $_POST['title'];
    $user = "angie";
    
    $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
    // //           db location,       user,     passwd,    database
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
        $sql_insert = "UPDATE `Book Search` SET Added = Added + 1 WHERE Title = '" . $title . "'";
        $r = $db->query($sql_insert);
        $sql_insert2 = "SELECT Added FROM `Book Search` WHERE Title = '" . $title . "'";
        $result = $db->query($sql_insert2);
        $numUsers = $result->fetch_assoc();
        $sql_insert = "INSERT INTO `Likes` VALUES('" . $user . "'," . "'" . $title . "')";
        $db->query($sql_insert);
    }
    echo 'This book was added by ' . $numUsers['Added'] . ' other users.';
    $db->close();
?>
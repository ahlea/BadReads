<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    $user = $_SESSION["username"];
    $db_name = "CS344F22BADREADS";
    $db_user = "AHLEA";
    $db_passwd = "Lindsey";
    $title = $_POST['title'];
    $type = $_POST['btype'];
    
    $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
    // //           db location,       user,     passwd,    database
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
        $sql = "SELECT user FROM `Likes` WHERE user = '" . $user . "' AND book = '" . $title . "'"; 
        $r = $db->query($sql);
        if(mysqli_num_rows($r)===0){
            $sql_insert = "UPDATE `Book Search` SET Added = Added + 1 WHERE Title = '" . $title . "'";
            $r = $db->query($sql_insert);
            $sql_insert = "INSERT INTO `Likes` VALUES('" . $user . "'," . "'" . $title . "'," . "'" . $type . "')";
            //echo $sql_insert;
            $db->query($sql_insert);
        }
        else {
            echo 'Your library already contains this book! <br><br>';
        }
    }
    $sql_insert2 = "SELECT Added FROM `Book Search` WHERE Title = '" . $title . "'";
    $result = $db->query($sql_insert2);
    $numUsers = $result->fetch_assoc();
    echo 'This book was added by ' . $numUsers['Added'] . ' other users.';
    $db->close();
?>
<?php
    // Report all error information on the webpage
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $db_name = "CS344F22BADREADS";
    $db_user = "AHLEA";
    $db_passwd = "Lindsey";
    $title = $_POST['title'];

    $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
        // Get comments
        $sql_cmt = "SELECT Comment FROM `Comments` WHERE Title = '" . $title . "'";
        $cmtResult = $db->query($sql_cmt) or die('Sorry, database operation was failed');
        // LOOP TILL END OF DATA
        while($rows3=$cmtResult->fetch_assoc()) {
            echo '<br><li id="eachCmt"><br>&nbsp; &nbsp; ' . $rows3['Comment'] . '</li><br>';
        }
    }
?>   
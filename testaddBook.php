<?php
    // Report all error information on the webpage
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $db_name = "CS344F22BADREADS";
    $db_user = "AHLEA";
    $db_passwd = "Lindsey";
    $user = $_POST['user'];
    $type = $_POST['btype'];
    
    $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
    // //           db location,       user,     passwd,    database
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
        $sql = "SELECT book FROM `Likes` WHERE user = '" . "'" . $user . "' AND type = '" . "'" . $type . "'";
        $r = $db->query($sql);
        if(mysqli_num_rows($r)===0){
            echo "No matching results";
        }
        //$result = array();
        while ($row = $r->fetch_assoc()){ 
            echo '<p href="bookInfo.php?id=' . $row['book'] . '">' . $row['book'] . '</a><br><br>';
        }
    }   
    $db->close();
?>
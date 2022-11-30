<?php
    // Report all error information on the webpage
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $db_name = "CS344F22BADREADS";
    $db_user = "AHLEA";
    $db_passwd = "Lindsey";
    $title = $_POST["searchBox"];
    
    $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                      // db location,   user,    passwd,    database
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    } else {
        $sql = "SELECT Title FROM `Book Search` WHERE Title LIKE '%" . $title . "%'";
        $r = $db->query($sql);
        if(mysqli_num_rows($r)===0){
            echo "No matching results";
        }
        //$result = array();
        while ($row = $r->fetch_assoc()){ 
            echo '<a href="bookInfo.php?id=' . $row['Title'] . '">' . $row['Title'] . '</a><br><br>';
        }
    }   
    $db->close();
?> 
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
        //Get average of all ratings
        $sql_get = "SELECT AVG(Rating) FROM `Comments` WHERE Title = '" . $title . "'";
        $rateAvg = $db->query($sql_get) or die('Sorry, database operation was failed');
        $rating = mysqli_fetch_row($rateAvg);
        echo 'Rating: &nbsp; &nbsp;' . $rating[0];
    }
?>    
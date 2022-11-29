<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Lindsey, Ahlea, Karis, Angie">

    <title>Book Search Page</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
	<?php
        include("menu.php")
        ?>
	
	
        <div>
             <h1>Search for a Book</h1>

        <form action="booksearch.php" method="POST">
            <input placeholder="Search..." type="text" name="searchBox" value=""><br>
            <input type="submit" name="enterSearch" value="Enter">
        </form>
        
    </div>
    <?php
            // Report all error information on the webpage
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        
        if (isset($_POST["enterSearch"])){
            $db_name = "CS344F22BADREADS";
            $db_user = "AHLEA";
            $db_passwd = "Lindsey";

            
            $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                          // db location,   user,    passwd,    database
            if ($db->connect_errno > 0) {
                die('Unable to connect to database [' . $db->connect_error . ']');
            } else {
                $title = $_POST["searchBox"];
                $check = 0;
                $sql = "SELECT Title FROM `Book Search`";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
					echo "Title: ". $row["Title"]. "<br>";
                    if($row["Title"] == $title){
                        $check = 1;
                        if($row["Title"] != $title){
                            echo '<script>alert("No books titles match that search")</script>';
                        }
                        else{
                            //echo "directing you to the book info page";
                            //header("Location: bookInfo.php");
                            //exit();
                        }
                    }
                }
                } else {
                echo "0 results";
                }
            }   
                $db->close();
                //echo("<p>Connection to " . $db_name . " closed.</p>");
        }

        ?>
        
</body>
</html>

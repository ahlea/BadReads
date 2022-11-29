<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lindsey, Ahlea, Karis, Angie">
        <link rel="stylesheet" href="BookInfo.css">
        <title>Book Info</title>
        <script src="bookInfo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
        <?php
        include("menu.php")
        ?>
        </header>
        
        <?php
        // Report all error information on the webpage
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);

        //Get value from html file using id
        //https://www.plus2net.com/php_tutorial/variables2.php
        $title = $_GET['id'];

        $db_name = "CS344F22BADREADS";
        $db_user = "AHLEA";
        $db_passwd = "Lindsey";

        $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                    // db location,      user,    passwd, database
        if ($db->connect_errno > 0) {
            die('Unable to connect to database [' . $db->connect_error . ']');
        } else {
            $sql_insert = "SELECT Title, Author, Blurb, Added FROM `Book Search` WHERE Title = '" . trim($title) . "'";
            $result = $db->query($sql_insert) or die('Sorry, database operation was failed');
            //Store the resuting row in an array
            //https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage
            while($row = mysqli_fetch_array($result)){
                $book = $row['Title'];
                $author = $row['Author'];
                $blurb = $row['Blurb'];
                $numUsers = $row['Added'];
            }
            $sql_get = "SELECT AVG(Rating) FROM `Comments` WHERE Title = '" . $title . "'";
            $rateAvg = $db->query($sql_get) or die('Sorry, database operation was failed');
            $rating = mysqli_fetch_row($rateAvg);
            $sql_cmt = "SELECT Comment FROM `Comments` WHERE Title = '" . $title . "'";
            $cmtResult = $db->query($sql_cmt) or die('Sorry, database operation was failed');
        }
        ?>    
        <div id="info">
            <div id="title">
                Book Title: &nbsp; &nbsp; <?php echo($book);?>
            </div>
            <div id="author">
                Author: &nbsp; &nbsp; <?php echo($author);?>
            </div>
            <div id="desc">
                Description: &nbsp; &nbsp; <?php echo($blurb);?>
            </div>
            <div id="rating">
                Rating: &nbsp; &nbsp; <?php echo($rating[0]);?>
            </div>
            <div id="added">
            <!--Change button value on click
                https://stackoverflow.com/questions/10671174/changing-button-text-onclick-->
            <form>
                <input onclick="change()" type="button" name="add" value="Add This Book to Your Library!" id="add"></input>
            </form>
            <?php
                if (isset($_POST["add"])) {
                    $change = $_GET["add"];
                    if ($change == "Add This Book to Your Library!"){
                        $sql_insert = "UPDATE `Book Search` SET Added = Added + 1 WHERE Title = '" . $book . "'";
                    }
                    else if ($change == "Remove This Book From Your Library"){
                        $sql_insert = "UPDATE `Book Search` SET Added = Added - 1 WHERE Title = '" . $book . "'";
                    }
                }
                echo("This book was added by " . $numUsers . " other users.");
                $db->close();  
            ?>
            </div>
        </div>
        <div id="fb">
            <p id="comments"> Comments </p>
            <form id="form" method="POST">
                <input type="hidden" name="title" value="<?=$title;?>"/>
                Leave a comment: <br>
                <textarea name="comment" rows="5" cols="40" required></textarea> 
                <br>
                Leave a rating: <br>
                &nbsp; 1 &nbsp; &nbsp; 2 &nbsp; &nbsp; 3 &nbsp; &nbsp; 4 &nbsp; &nbsp; 5 
                <br>
                <input type="range" min="1" max="5" class="slider" id="myRange" name="rating">
                <br>
                <input type="submit" name="submit" value="Submit"> 
            </form> 
            <p id="cStyle"> All Comments: </p>
            <?php
                // LOOP TILL END OF DATA
                while($rows3=$cmtResult->fetch_assoc())
                {
            ?>
            <ul id="cmtList">
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <br><li>&nbsp; &nbsp;<?php echo $rows3['Comment'];?></li><br> 
            </ul>
            <?php
                }
            ?>
            <script>
            $("form").submit(
                function(e){
                    // prevent jQuery refresh the whole page after appending the new element. See the following page for more detail
                    // https://stackoverflow.com/questions/31357050/jquerypage-refreshes-after-appending-html-with-html
                    //e.preventDefault();
                    <?php
                        // Report all error information on the webpage
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);

                        $db_name = "CS344F22BADREADS";
                        $db_user = "AHLEA";
                        $db_passwd = "Lindsey";

                        $title = $_POST["title"];
                        $cmt = $_POST["comment"];
                        $rate = $_POST["rating"];

                        $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                        // //           db location,       user,     passwd,    database
                        if ($db->connect_errno > 0) {
                            die('Unable to connect to database [' . $db->connect_error . ']');
                        } else {
                            $sql_insert = "INSERT INTO Comments (Title, Comment, Rating) "."VALUES ('" . $title . "', '" . $cmt . "', " . $rate . ")";
                            $result = $db->query($sql_insert) or die('Sorry, database operation was failed');
                        }
                        $db->close();
                    ?>
                });
            </script>
        </div>
    </body>
</html>

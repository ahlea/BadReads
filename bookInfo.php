<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lindsey, Ahlea, Karis, Angie">
        <link rel="stylesheet" href="BookInfo.css">
        <title>Book Info</title>
        <script src="bookInfo.js"></script>
    </head>
    <body>
        <header>
            <h1> 
                &nbsp; &nbsp;BadReads
                <div id="menu">
                    <ul>
                        <li><a href="?">Search</a></li>
                        <li><a href="User_Profile.php">User Profile</a></li>
                        <li><a href="?">Logout</a></li>
                    </ul>
                </div>
            </h1>
        </header>
    <?php
    // Report all error information on the webpage
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

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
        $sql_insert = "SELECT * FROM `Book Search` WHERE Title = '" . trim($title) . "'";
        $db->query($sql_insert) or die('Sorry, database operation was failed');
    }
    
    $result = $db->query($sql_insert) or die('Sorry, database operation was failed');
    //echo($result);

    //Store the resuting row in an array
    //https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage
    while($row = mysqli_fetch_array($result)){
        $book = $row['Title'];
        $author = $row['Author'];
        $blurb = $row['Blurb'];
        $rating = $row['Rating'];
        $numUsers = $row['Added'];
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
            Rating: &nbsp; &nbsp; <?php echo($rating);?>
        </div>
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
    </body>
</html>
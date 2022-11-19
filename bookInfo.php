<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lindsey, Ahlea, Karis, Angie">

        <title>Book Info</title>
        <script src="bookInfo.js"></script>
    </head>
    <body>
    <?php
    // Report all error information on the webpage
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //Get value from html file using id
    //https://w3schools.invisionzone.com/topic/30490-echoing-a-dom-element/
    $doc = new DOMDocument();
    $doc->loadHTMLFile("login.html");
    $title = $doc->getElementById("book")->nodeValue;

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

    //Store the resuting row in an array
    //https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage
    while($row = mysqli_fetch_array($result)){
        $book = $row['Title'];
        $author = $row['Author'];
        $blurb = $row['Blurb'];
        //$rating = $row['Rating'];
        //echo($rating);
    }
    $db->close();  

    ?>    
    <div id="title">
        Book Title: <?php echo($book);?>
    </div>
    <div id="author">
        Author: <?php echo($author);?>
    </div>
    <div id="author">
        Description: <?php echo($blurb);?>
    </div>
    <div id="rating">
        Rating:
    </div>
    <!--Change button value on click
        https://stackoverflow.com/questions/10671174/changing-button-text-onclick-->
    <form>
        <input onclick="change()" type="button" value="Add This Book to Your Library!" id="add"></input>
    </form>
    <?php
        $numUsers = 3;
        echo("This book was added by " . $numUsers . " other users.");
    ?>
    
    </body>
</html>
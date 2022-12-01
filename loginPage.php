<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Lindsey, Ahlea, Karis, Angie">

    <title>Login Page</title>
    <link rel="stylesheet" href="BookInfo.css"> <!-- a style container here is called an internal style. We took it out to link the css page which is an external cascading style sheet. -->
</head>
<body id ="blur">
        <div id ="clear">
             <h1>Book Talk Login</h1>

        <form action="loginPage.php" method="POST">
            <input id ="inputSize" placeholder="Username" type="text" name="user" value=""><br>
            <input id ="inputSize" placeholder="Password" type="password" name="pass" value=""><br>
            <!-- <input type="button" name="inputPasswdButton" value="Login" onclick="readPasswd();"> -->
            <input id ="inputSize" type="submit" name="submitLogin" value="Login">
            <input id ="inputSize" type="submit" name="submitNew" value="New User">
        </form>
        <p>created by Ahlea, Angie, Karis, and Lindsey</p>
    </div>
    <?php
            // Report all error information on the webpage
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

        if (isset($_POST["submitNew"])){
            $db_name = "CS344F22BADREADS";
            $db_user = "AHLEA";
            $db_passwd = "Lindsey";

            $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                          // db location,      user,    passwd, database
            if ($db->connect_errno > 0) {
                die('Unable to connect to database [' . $db->connect_error . ']');
            } else {
                $user = $_POST["user"]; //turn into string taken from https://www.geeksforgeeks.org/php-strval-function/#:~:text=The%20strval()%20function%20is,or%20double)%20to%20a%20string.
                $pass = $_POST["pass"];

                $check = 0; //if this is >0 then there is already a usersame with that user input

                $sql = "SELECT username FROM loginTable";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) { //info about query"https://www.w3schools.com/php/php_mysql_select.asp
                        echo "username: " . $row["username"]. "<br>";
                        if($row["username"] == $user){
                            $check = 1;
                            echo '<script>alert("Username already exists")</script>';
                        }
                    }
                }
                if($check == 0 ){
                    $sql_insert = "INSERT INTO loginTable (username, pass) ".
                    "VALUES ('" . $user . "', '" . $pass . "')"; //syntax
                    
                    $db->query($sql_insert) or die('Sorry, database operation was failed');
                    session_start();
                    $_SESSION["username"] = $user;
                    header("Location:bookSearchPage.php");
                    exit();
                }
            }
            $db->close();
            echo("<p>Connection to " . $db_name . " was closed.</p>");
        }
        
        if (isset($_POST["submitLogin"])){
            $db_name = "CS344F22BADREADS";
            $db_user = "AHLEA";
            $db_passwd = "Lindsey";

            $check = 0; //check will be >0 if the username is correct and the password does not match
            $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                          // db location,      user,    passwd, database
            if ($db->connect_errno > 0) {
                die('Unable to connect to database [' . $db->connect_error . ']');
            } else {
                $user = $_POST["user"]; //turn into string taken from https://www.geeksforgeeks.org/php-strval-function/#:~:text=The%20strval()%20function%20is,or%20double)%20to%20a%20string.
                $pass = $_POST["pass"];
                // echo("<p>Connection to " . $db_name . " was established successfully.</p>");
                // CREATE TABLE MESSAGES (ID int NOT NULL AUTO_INCREMENT, NAME varchar(20), MSG varchar(255), PRIMARY KEY (ID));
                $sql = "SELECT username, pass FROM loginTable";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { //info about query"https://www.w3schools.com/php/php_mysql_select.asp
                    echo "username: " . $row["username"]. " - pass: " . $row["pass"]. " " . "<br>";
                    if($row["username"] == $user){
                        $check = 1;
                        if($row["pass"] != $pass){
                            echo '<script>alert("Username does not match password")</script>';
                        }
                        else{
                            //echo "you are able to sign in";
                            session_start();
                            $_SESSION["username"] = $user;
                            header("Location: bookSearchPage.php");
                            exit();
                        }
                    }
                }
                } else {
                echo "0 results";
                }
            }   
                $db->close();
                echo("<p>Connection to " . $db_name . " was closed.</p>");
        }

        ?>
        
</body>
</html>

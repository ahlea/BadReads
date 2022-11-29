<!DOCTYPE html>

<html lang = "en">

    <link rel="stylesheet" href="menu.css">

    <header id= "bar">
            <h1> 
            <?php
            session_start();
            $user = $_SESSION["username"];
            ?>
                <div id="user"><?= $user ?></div>
                
                <div id="title">BadReads</div>

                <div id="menu">
                    <ul>
                        <li><a href="bookSearch.php">Search</a></li>
                        <li><a href="User_Profile.php">User Profile</a></li>
                        <li><a href="loginPage.php"> <?= session_destroy(); session_unset(); ?> Logout</a></li>
                        <li><a href="ack.html">Acknowledgements</a></li>
                    </ul>
                </div>
            </h1>
    </header>

</html>

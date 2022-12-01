<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lindsey, Ahlea, Karis, Angie">
        <title>Book Search Page</title>
        <link rel="stylesheet" href="BookInfo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <?php
            include("menu.php")
            ?>
        </header>
        <div id="search">
             <h1>Search for a Book</h1>

            <form method="POST">
                <input id ="inputSize" placeholder="Search... Press enter to view a list of all the books" type="text" name="searchBox" value=""><br>
                <input id ="inputSize" type="submit" name="enterSearch" value="Search">
                <p id="data"></p>
            </form>
            <script>
                $("form").submit(
                    function(e){
                        // prevent jQuery refresh the whole page after appending the new element. See the following page for more detail
                        // https://stackoverflow.com/questions/31357050/jquerypage-refreshes-after-appending-html-with-html
                        e.preventDefault();
                        
                        $.post("bookSearch.php", $(this).serialize(),
                            function(data){ // callback function
                                $("#data").html(data);
                            }, 
                        );
                    }
                );
            </script>
        </div>
    </body>
</html>
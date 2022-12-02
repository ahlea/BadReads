<!DOCTYPE html>
<html style= "background-image: url('https://ecy1979.files.wordpress.com/2018/12/library-b694b8c4b0334227a4d614158cc1deb6.jpg'); background-size: cover; background-repeat: no-repeat; color: white;">

    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lindsey, Ahlea, Karis, Angie">
        <title>Book Search Page</title>
        <link rel="stylesheet" href="BookInfo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <?php
            include("menu.php")
        ?>

        <div id="search">
            <h1>Search for a Book</h1>

            <form method="POST">
                <input id ="inputSize" placeholder="Search... " type="text" name="searchBox" value=""><br>
                <input id ="inputSize" type="submit" name="enterSearch" value="Search"><br>
                <p id="hint"> *Press the Search button to view available books* </p>
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
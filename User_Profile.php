<!DOCTYPE html>

<html style= "background-image: url('https://ecy1979.files.wordpress.com/2018/12/library-b694b8c4b0334227a4d614158cc1deb6.jpg'); background-size: cover; background-repeat: no-repeat; color: white;">

  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Karis Plath">
    <title> Profile </title>
    <script src="userProfile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="BookInfo.css">
  </head>

  <body>
        
    <?php
      include("menu.php")
    ?>

    <div class="tab">
      <button class="tablinks" type="button" onclick="showBooks('Reading')">Reading</button>
      <button class="tablinks" type="button" onclick="showBooks('Read')">Read</button>
      <button class="tablinks" type="button" onclick="showBooks('Wishlist')">Wishlist</button>
    </div>
          
    <div id="Reading" class="tabcontent">
      <div id="currentTab">
        User Profile <br><br>
        Use this page to view and manage the books you have added to your library.
      <div>
    </div>
  </body>
</html>
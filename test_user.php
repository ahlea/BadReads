<!DOCTYPE html>

<html lang = "en">

    <head>
        <meta charset="UTF-8">

        <meta name="author" content="Karis Plath">

        <title> Profile </title>

        <link rel="stylesheet" href="Profile.css">
    </head>

    <body>
        
        <?php
          include("menu.php")
          session_start();
          $user = $_SESSION["username"];
        ?>

          <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Reading', '<?php echo $user ?>')" id= "defaultOpen">Reading</button>
            <button class="tablinks" onclick="openTab(event, 'Read', '<?php echo $user ?>')">Read</button>
            <button class="tablinks" onclick="openTab(event, 'Wishlist', '<?php echo $user ?>')">Wishlist</button>
          </div>
          
          <div id="Reading" class="tabcontent">
            <h3>Reading</h3>
            <p>Curently Reading</p>
            <div id="books"></div>
          </div>
          
          <div id="Read" class="tabcontent">
            <h3>Read</h3>
            <p>Already Read</p>
            <div id="books"></div>
          </div>
          
          <div id="Wishlist" class="tabcontent">
            <h3>Wishlist</h3>
            <div id="books"></div>
          </div>
        </div>

        <script>
          function openTab(evt, tabName, user) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
            showBooks(user, tabName);
          }

          function showBooks(user, tabName){
            $.ajax({
              url:"addBook.php",    //the page containing php script
              type: "post",    //request type,
              data: {user: user, btype: tabName},
              success:function(data){
                  $("#books").html(data);
                }
            });
          }
          
          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();
          </script>
        
    </body>

</html>
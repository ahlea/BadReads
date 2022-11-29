<!DOCTYPE html>

<html lang = "en">

    <head>
        <meta charset="UTF-8">

        <meta name="author" content="Karis Plath">

        <title> Profile </title>

        <link rel="stylesheet" href="Profile.css">
    </head>

    <body>
<<<<<<< Updated upstream

      <header>
        <h1> <?php $_SESSION["username"] ?></h1> 
      </header>

        <div class = "username">

        </div>
=======
        
        <?php
        include("menu.php")
        ?>
>>>>>>> Stashed changes

        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Reading')" id= "defaultOpen">Reading</button>
            <button class="tablinks" onclick="openTab(event, 'Read')">Read</button>
            <button class="tablinks" onclick="openTab(event, 'Wishlist')">Wishlist</button>
          </div>
          
          <div id="Reading" class="tabcontent">
            <h3>Reading</h3>
            <p>Curently Reading</p>
          </div>
          
          <div id="Read" class="tabcontent">
            <h3>Read</h3>
            <p>Already Read</p>
          </div>
          
          <div id="Wishlist" class="tabcontent">
            <h3>Wishlist</h3>
            <p>Want to Read</p>
          </div>
        </div>

        <script>
          function openTab(evt, tabName) {
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
          }
          
          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();
          </script>
        
    </body>

</html>
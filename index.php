<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      session_start();
      if (isset($_POST["logout_button"])){
        session_destroy();
        session_start();
      }  
      if (isset($_SESSION["username"])){
        include("header.php");
      } else {
        include("header.html");
      }
     ?>

    <div id="main">
        <h1 id="title">Galindo's Green Plan</h1>
        <p id="text">
            Καλώς ήρθατε στη σελίδα μας, όπου κάνουμε το περιβάλλον ενα πιο φιλικό<br>
            και υγιές μέρος. Γίνε και εσύ μέλος της ομάδας μας!<br>
            <a href="about.html">Μάθε περισσότερα...</a>
        </p>
    </div>



</body>
</html>

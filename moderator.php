<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleNews.css">
</head>
<body>
  <?php
    include("headerSelection.php");
    include("dbconnection.php");
  ?>

  <div class="main">


  </div>

  <script>
      function showImage(picture){
          document.getElementById(picture).style.display = "block";
      }

      function closeImage(picture){
          document.getElementById(picture).style.display = "none";
      }
  </script>

</body>
</html>

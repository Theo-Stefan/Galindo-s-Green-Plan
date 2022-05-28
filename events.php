<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleEvents.css">
</head>
<body>
    <?php
      include("headerSelection.php");
      include("dbconnection.php");
      $sql = "SELECT title, description, date, url, image, priority FROM Events ORDER BY priority";
      $MAX_POST = 3;
     ?>

    <div class="main">
        <div class="white-cover">
            <h1>Εκδηλώσεις</h1>
            <?php     // Moderator Button
              if(isset($_SESSION["ismod"])){
                if ($_SESSION["ismod"]){
                  echo "<form class=\"right\" action=\"modEvents.php\" method=\"post\">
                          <div><button type=\"submit\" name=\"workshop\"> Add Events </button></div>
                        </form>";
                }
              }

              // if an user is connected show it else not
              if (!isset($_SESSION["email"])){
                echo "<h2> Πρέπει να συνδεθείτε για να μπορέσετε να δείτε τις εκδηλώσεις μας!</h2>
                      <center>
                        <form type=\"post\" action=\"login.php\">
                          <button type=\"submit\">Σύνδεση</button>
                        </form>
                      </center>";
              } else {
                echo "<div class=\"image-container\">";
                  $counter = 0;
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                      container($row["title"], $row["description"], $row["date"], $row["url"], $row["image"], $counter);
                      $counter++;
                      if ($counter>=$MAX_POST) {    // Max 8 News at a time
                        break;
                      }
                    }
                  } else {
                    echo "<h3>No News available!<h3>";
                  }
                }

              function container($title, $desc, $date, $url, $image, $position){
                echo "<div class=\"image\"><img src=\"images/$image\" alt=\"image\" onclick=\"showImage('$position');\"> <p>$title</p></div>
                <!--text box for pic1-->
                <div class=\"popup-window\" id=\"$position\">
                    <div class=\"close-btn\" onclick=\"closeImage('$position')\">&times;</div>
                    <div class=\"white-board\">
                        <h2> $title</h2>
                        <p>$date<br>
                           $desc
                        </p>
                        <p class=\"text-source\">Πηγή:$url</p>
                    </div>
                </div>";
              }

             ?>
             </div>
        </div>

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

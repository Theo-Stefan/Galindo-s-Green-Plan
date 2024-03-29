<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleModerator.css">
</head>
<body>

  <?php
    include("headerSelection.php");
    include("dbconnection.php");
    $sql = "SELECT id, title, description, date, url, image, priority FROM News;";
    $VALID_TYPES_IMAGES = ["tiff", "tif", "jpg", "jpeg", "gif", "png"];
    $Err = "";
  ?>

  <div class="main">
    <div class="list">
      <center><h3>News</h3></center>
      <?php   // Load the news dynimically
        $counter = 0;
        $pointer = array();   // To know whick title has which info

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<form action=\"moderator.php\" method=\"post\">
                    <button class=\"link\" type=\"submit\" name=\"news".$counter."\">
                    <p style=\"color:blue\">".$row["title"]."</p>
                  </form>";
            // $pointer = Arr::add('news'.$counter. => $row["id"]);
            $pointer['news'.$counter] = $row["id"];
            $counter++;
          }

        } else {
          $Err .= "<br><br><br>
          Δεν υπάρχει κανένας νέο ανεβασμένο.<br>";
        }
       ?>
       <form action="moderator.php" method="post">
         <button type="submit" name="create">Create</button>
       </form>
    </div>

    <!-- Working Frameword -->
    <div class="working-frame">
      <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          // Print the informations of its of the posts
          foreach($pointer as $name => $value){
            if (isset($_POST[$name])){
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                if ($row["id"] == $value){
                  mainFrameSave($row["title"],$row["description"],$row["date"],$row["url"],$row["image"],$row["priority"]);

                  $_SESSION["newsId"] = $value;
                  break;
                }
              }

            }
          }

          //==================================================================================
          // Saving the post
          if (isset($_POST["save"])) {
             $flag = true;

             // Check Title
             if(empty($_POST["title"])){
               $Err .= "Please enter a title<br>";
               $flag = false;
             }

             // Check date
             if (!empty($_POST["date"])){
               $d = explode("-", $_POST["date"]);
               if (!($d[0] > 1400 && $d[0]<date('Y') || $d[0]==date('Y') && $d[1]<date('m') ||
                $d[0]==date('Y') && $d[1]==date('m') && $d[2]<=date('d'))){
                  $Err .= "Date error. Please check the date!<br>";
                  $flag = false;
               }
             } else {
               $Err .= "Date error. Please check the date!<br>";
               $flag = false;
             }

             // Check image
             $filename = $_FILES["file"]["name"];
             $tempname = $_FILES["file"]["tmp_name"];
             $folder = "images/".$filename;


             if (empty($filename)){ // Priority to the new selected file
               $filename = $_POST["image"];
               $sqlSearch = "SELECT * FROM Images WHERE filename LIKE '".$_POST["image"]."';";
               $result = $conn->query($sqlSearch);
               if ($result->num_rows == 0){
                 $Err .= "That image doesn't exist.<br>";
                 $flag = false;
               }

             } else { // An file has been uploaded
               $result = explode(".", $filename);
               $type =$result[count($result)-1];

               // if the tempname is not empty and we have a valid type of image then...
               if (in_array($type, $VALID_TYPES_IMAGES)){

                 $sqlSearch = "SELECT filename FROM Images WHERE filename LIKE '$filename';";
                 $result = $conn->query($sqlSearch);
                 if ($result->num_rows == 0){   // if the file does not exist in the database save it
                   $sqlInsert = "INSERT INTO Images (filename) VALUES ('$filename')";

                   if (!empty($tempname)){
                     if ($conn->query($sqlInsert) == true){
                       // Add the image to the "images" folder"
                       if (!move_uploaded_file($tempname, $folder)) {
                         $Err .= "Error occured during the saving of the image<br>Please try again<br>";
                         $flag = false;
                       }

                     } else {
                       $Err .= "Error occured during the saving of the image<br>Please try again<br>";
                       $flag = false;
                     }

                   } else {
                     $Err .= "The selected image can't be uploaded<br>
                     Please if it is big in size select one smaller<br>";
                     $flag = false;
                   }

                 }

               } else {
                 $Err .= "The uploaded file is not an image type file<br>
                 Please add only images";
                 $flag = false;
               }

             }

             // Push Priorities
             securePriority($conn, $sql);

             if ($flag){
               $sqlSave = "UPDATE News
                SET title = '".$_POST["title"]."', description = '".$_POST["desc"]."',
                date = '".$_POST["date"]."', url = '".$_POST["url"]."', image = '".$filename."', priority = ".$_POST["priority"]."
                WHERE id=".$_SESSION["newsId"].";";

                $Err .= "SQLSAVE:".$sqlSave."<br>";

               if ($conn->query($sqlSave)==true){
                 echo "<h2>Post saved!</h2>";
               } else {
                 echo "<h2>Error occured during saving!</h2>";
               }
             } else {
               $Err .= "Error during saving.<br>";
               mainFrameSave($_POST["title"], $_POST["desc"], $_POST["date"], $_POST["url"], $_POST["image"], $_POST["priority"]);
               echo $Err;
             }

          }

          //=================================================================================
          // Check deletion and delete the Selected new
          if(isset($_POST["delete"])) {
            echo "<center>
                    <h1>Are you sure you want to delete this Post?</h1>
                    <form action=\"moderator.php\" method=\"post\">
                      <button type=\"submit\" name=\"deleteYes\">Yes</button>
                      <button type=\"submit\" name=\"deleteNo\">No</button>
                    </form>
                  </center>";

          } else if (isset($_POST["deleteYes"])){
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
              if ($row["id"] == $_SESSION["newsId"]){
                $sqlDelete = "DELETE FROM News WHERE id=".$row["id"].";";
                if($conn->query($sqlDelete)==true){ // Check if the query was executed
                  echo "<h2>The selected post was deleted successfully!</h2>";
                } else {
                  echo "<h2>The post wasn't deleted.</h2>";
                }
                break;
              }
            }
          }

          //==========================================================================
          // Creating new posts

          if (isset($_POST["create"])){
            mainFrameCreate("","","","","","");

          } else if (isset($_POST["createSql"])) {
            $flag = true;
            $Err = "";

            // Check Title
            if(empty($_POST["title"])){
              $Err .= "Please enter a title<br>";
              $flag = false;
            }

            // Check date
            if (!empty($_POST["date"])){
              $d = explode("-", $_POST["date"]);
              if (!($d[0] > 1400 && $d[0]<date('Y') || $d[0]==date('Y') && $d[1]<date('m') ||
               $d[0]==date('Y') && $d[1]==date('m') && $d[2]<=date('d'))){
                 $Err .= "Date error. Please check the date!<br>";
                 $flag = false;
              }
            } else {
              $Err .= "Date error. Please check the date!<br>";
              $flag = false;
            }

            // Check priority
            if (!empty($_POST["priority"])){
              securePriority($conn, $sql);
            } else {
              $Err .= "Please give this a priority number<br>";
              $flag = false;
            }


            // check image file
            if (isset($_FILES["fileCreate"]["name"]) ){ // if a file is selected
              $filename = $_FILES["fileCreate"]["name"];
              $tempname = $_FILES["fileCreate"]["tmp_name"];
              $folder = "images/".$filename;

              if (!empty($filename)){ // Priority to the new selected file
                $result = explode(".", $filename);
                $type =$result[count($result)-1];

                // if the tempname is not empty and we have a valid type of image then...
                if (in_array($type, $VALID_TYPES_IMAGES)){

                  $sqlSearch = "SELECT filename FROM Images WHERE filename LIKE '$filename';";
                  $result = $conn->query($sqlSearch);
                  if ($result->num_rows == 0){   // if the file does not exist in the database save it
                    $sqlInsert = "INSERT INTO Images (filename) VALUES ('$filename')";

                    if (!empty($tempname)){
                      if ($conn->query($sqlInsert) == true){
                        // Add the image to the "images" folder"
                        if (!move_uploaded_file($tempname, $folder)) {
                          $Err .= "Error occured during the saving of the image<br>Please try again<br>";
                          $flag = false;
                        }

                      } else {
                        $Err .= "Error occured during the saving of the image<br>Please try again<br>";
                        $flag = false;
                      }

                    } else {
                      $Err .= "The selected image can't be uploaded<br>
                      Please if it is big in size select one smaller<br>";
                      $flag = false;
                    }

                  }

                } else {
                  $Err .= "The uploaded file is not an image type file<br>
                  Please add only images";
                  $flag = false;
                }

              }

            } else { // if a file is not selected then we check the field text
              $filename = $_POST["image"];
              $sqlSearch = "SELECT * FROM Images WHERE filename LIKE '".$_POST["image"]."';";
              $result = $conn->query($sqlSearch);
              if ($result->num_rows == 0){
                $Err .= "That image doesn't exist in the database.<br>";
                $flag = false;
              }
            }



            if ($flag){  // Everything is fine in the data that were given
              $sqlInsert = "INSERT INTO News (title, description, date, url, image, priority)
                VALUES ('".$_POST["title"]."', '".$_POST["desc"]."', '".$_POST["date"]."',
                   '".$_POST["url"]."', '".$filename."', ".$_POST["priority"].");";

              if ($conn->query($sqlInsert)==true){
                echo "<h2>Post was inserted successfully!</h2>";
              } else {
                echo "<h2>Error occured during saving of the created post!,/h2>";
              }
            } else {  //Errors with the data.
              mainFrameCreate($_POST["title"], $_POST["desc"], $_POST["date"], $_POST["url"], $_POST["image"], $_POST["priority"]);
              echo $Err;
            }

          }

          //=============================================================
          // Reload button
          if (isset($_POST["reload"]) || isset($_POST["workshop"])){
            echo "<h1> Workspace </h1>
            <h2>You can use in the title and description html tags<h2>
            <h2>Priority shows the order of the posts</h2>";
            echo "<form method=\"post\" action=\"modEvents.php\">
                    <center><button type=\"submit\" name=\"workshop\"> Add Events </button></center>
                  </form>";
          }

        } else {
          echo "<h1>Workspace</h1>";
        }

        function mainFrameCreate($t, $des, $d, $url, $im, $pr){
          echo "<form action=\"moderator.php\" method=\"post\" enctype=\"multipart/form-data\">
                <center>
                  <h2> Title </h2>
                  <input class=\"fields\" type=\"text\" name=\"title\" value=\"".$t."\">
                  <h2> Description </h2>
                  <textarea type=\"text\" id=\"desc\" name=\"desc\">".$des."</textarea>
                  <h2> Date </h2>
                  <input type=\"date\" name=\"date\" value=\"".$d."\">
                  <h2> Link </h2>
                  <input class=\"fields\" type=\"text\" name=\"url\" value=\"".$url."\">
                  <h2> Image </h2>
                  <input class=\"fields\" type=\"text\" name=\"image\" value=\"".$im."\">
                  <input type=\"file\" name=\"fileCreate\">
                  <h2> Priority </h2>
                  <input type=\"number\" name=\"priority\" value=\"".$pr."\">
                  <button type=\"submit\" name=\"createSql\">Create</button>
                  <button name=\"discard\">Discard</button>
                </center>
                </form>";
        }

        function mainFrameSave($t, $des, $d, $url, $im, $pr) {
          echo "<form action=\"moderator.php\" method=\"post\" enctype=\"multipart/form-data\">
                <center>
                  <h2> Title </h2>
                  <input class=\"fields\" type=\"text\" name=\"title\" value=\"".$t."\">
                  <h2> Description </h2>
                  <textarea type=\"text\" id=\"desc\" name=\"desc\">".$des."</textarea>
                  <h2> Date </h2>
                  <input type=\"date\" name=\"date\" value=\"".$d."\">
                  <h2> Link </h2>
                  <input class=\"fields\" type=\"text\" name=\"url\" value=\"".$url."\">
                  <h2> Image </h2>
                  <img src=\"images/".$im."\" height=\"100\" width=\"100\">
                  <input class=\"fields\" type=\"text\" name=\"image\" value=\"".$im."\">
                  <input type=\"file\" name=\"file\">
                  <h2> Priority </h2>
                  <input type=\"number\" name=\"priority\" value=\"".$pr."\">
                  <button type=\"submit\" name=\"save\">Save</button>
                  <button name=\"delete\">Delete</button>
                </center>
                </form>";
        }

        function securePriority($conn, $sql){
          $chprio = false;
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){   // If the same priority exists push the existent
            if ($row["priority"] == $_POST["priority"]){  // one up (until it is okay)
              $otherId = $row["id"];
              $otherPriority = $row["priority"];
              $chprio = true;

              while ($chprio){    // finde the sweet spot to enter the new priority
                //$result = $conn->query($sql);
                $chprio = false;
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  if ($row["priority"] == $otherPriority){
                    $otherPriority = $otherPriority + 1;
                    $chprio = true;
                    break;
                  }

                }
                if (!$chprio){
                  $sqlUpdate = "UPDATE News SET priority = $otherPriority WHERE id=$otherId;";
                  if (!$conn->query($sqlUpdate)==true){
                    echo "Error occured during the change of the other priority!";
                  }
                }


              }

              break;
            }
          }

          return true;
        }
      ?>
      <form method="post">
        <button name="reload">Reload</button>
      </form>
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

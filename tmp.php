<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleLogin.css">
  </head>
  <body>

    <form method="POST" action="" enctype="multipart/form-data">
       <input type="file" name="choosefile" value="" />
       <div>
           <button type="submit" name="uploadfile">         UPLOAD       </button>
       </div>
   </form>


    <!-- <form action="tmp.php" method="post">
      E-mail: <input type="text" name="email"><br>
      code: <input type="text" id="code2" name="code"><br>
      <a id="login-btn"  href="##"><button type="submit">Είσοδος</button></a>
    </form> -->

    <?php
      $msg = "";
      include("dbconnection.php");

      //check if the user has clicked the button "UPLOAD"

      if (isset($_POST['uploadfile'])) {
        $filename = $_FILES["choosefile"]["name"];
        $tempname = $_FILES["choosefile"]["tmp_name"];
        $folder = "images/".$filename;

        // query to insert the submitted data
        $sql = "INSERT INTO Images (filename) VALUES ('$filename')";
        // function to execute above query
        if ($conn->query($sql) == true){
          // Add the image to the "image" folder"
          if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
          }else{
            $msg = "Failed to upload image";
          }
        }
        echo $msg;

      }


      // $sql = "DELETE FROM Images;";
      //
      // if ($conn->query($sql) == true){
      //   echo "done";
      // } else {
      //   echo "fuck";
      // }

      //$result = mysqli_query($db, "SELECT * FROM image");
      $conn->close();

     ?>

  </body>
</html>

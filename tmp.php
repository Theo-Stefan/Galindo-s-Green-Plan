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
       <input type="file" name="file" value="" accept="image/*"/>
       <div>
           <button type="submit" name="uploadfile">UPLOAD</button>
       </div>
   </form>


    <?php

      $msg = "";
      include("dbconnection.php");

      //check if the user has clicked the button "UPLOAD"
      if (isset($_FILES["file"]["name"])) {
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "images/".$filename;

        echo $_FILES["file"]["full_path"]."<br>";
        if (!empty($tempname)){
          if(is_array(getimagesize($tempname))){
            echo "it is an image.<br>";
            foreach (getimagesize($tempname) as $v) {
              echo $v."<br>";
            }
          } else {
            echo "It is NOT an image";
          }
        }

        if (empty($filename)){
          echo "The file is empty";
        }


        // query to insert the submitted data
        // $sql = "INSERT INTO Images (filename) VALUES ('$filename')";
        // function to execute above query
        // if ($conn->query($sql) == true){
        //   // Add the image to the "image" folder"
        //   if (move_uploaded_file($tempname, $folder)) {
        //     $msg = "Image uploaded successfully";
        //   }else{
        //     $msg = "Failed to upload image";
        //   }
        // }
        // echo $msg;

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

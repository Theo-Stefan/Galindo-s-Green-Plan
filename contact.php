<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="styleContact.css">
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

    <div id="white-cover1">
        <h1>Επικοινώνησε μαζί μας</h1>

        <h2>Θέμα</h2>
        <form method="post" action="contact.php">
          <input class="fields" type="text" id="title-message" name="title" placeholder="">

          <h2>Μήνυμα</h2>
          <textarea class="fields" type="text" id="message" name="msg" placeholder=""></textarea>
          <a id="send-message"><button type="submit" name="contact_button">Αποστολή</button></a>
        </form>
    </div>

    <?php
      $email = "galindosplan@gmail.com";
      if (isset($_SESSION["email"])){
        $header ="From: ".$_SESSION["email"]."\r\n";
      } else {
        $header = "";
      }


      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $flag = true;
        if (empty($_POST["title"])){
          $flag = false;
        } else {
          $title = test_input($_POST["title"]);
        }

        if (empty($_POST["msg"])){
          $flag = false;
        } else {
          $msg = wordwrap(test_input($_POST["msg"]), 70);
        }

        if($flag){
          mail($email, $title, $msg, $header);
          echo "Το μυνημά σας στάλθηκε!";

        } else {
          echo "Παρακαλώ συμπληρώστε την φόρμα πριν την υποβολή.";
        }
      }


      function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
     ?>


    <div id="white-cover2">
        <h1>Στοιχεία επικοινωνίας</h1>
        <h3>Τηλέφωνο: 2310 696 969</h3>
        <h3>Email: galindosplan@gmail.com</h3>

        <h3>Το γραφείο μας</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d936.377648146786!2d28.60374
        912919247!3d-20.154455399154894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1eb55441c5fd
        f03d%3A0x82ded25c7fba1a97!2zNjkgTGl2aW5nc3RvbmUgUmQsIEJ1bGF3YXlvLCDOls65zrzPgM6szrzPgM6_z4XOtQ
        !5e0!3m2!1sel!2sgr!4v1651406242508!5m2!1sel!2sgr" width="400" height="300" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>


</body>
</html>

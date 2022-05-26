<?php
  session_start();
  if (isset($_POST["logout_button"])){
    session_destroy();
    session_start();
  }
  if (isset($_SESSION["username"])){
    if ($_SESSION["ismod"]){    // moderating tabs or not
      include("modHeader.php");
    } else {
      include("header.php");
    }

  } else {            // Default site
    include("HTML/header.html");
  }
 ?>

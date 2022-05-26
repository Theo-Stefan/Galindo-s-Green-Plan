<?php
  if (isset($_GET["search"])){
    include("dbconnection.php");
    // News site
    $sql = "SELECT * FROM News WHERE title LIKE '%".$_GET["search"]."%';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 || $_GET["search"]=="news") {
      header("Location: news.php");
    }

    // Events
    $sql = "SELECT * FROM Events WHERE title LIKE '%".$_GET["search"]."%';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 || $_GET["search"]=="events") {
      header("Location: events.php");
    }

    if ($_GET["search"]=="email" || $_GET["search"]=="contact" || $_GET["search"]=="phone" || $_GET["search"]=="address"){
      header("Location: contact.php");
    }

    if($_GET["search"]=="about" || $_GET["search"]=="moderators" || $_GET["search"]=="info"){
      header("Location: about.php");
    }

    $conn->close();
  }
?>

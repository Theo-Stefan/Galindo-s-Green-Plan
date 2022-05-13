<?php
  //Database Section
  $servername = "localhost";  // Server's name
  $db_username = "root"; // User's name
  $db_password = "123456789"; // User's password
  $db_name = "Galindo"; // Database's name
  // Table: Users
  // Columns: id, firstname, lastname, username, email, password, reg_date, ismod
  $conn = new mysqli($servername, $db_username, $db_password, $db_name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleCreateAccount.css">
</head>
<body>
  <?php include("HTML/header.html"); ?>

<div id="main">
    <div id="white-cover">
        <h1>Δημιουργία Λογαριασμού</h1>

        <h2>Όνομα</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <input class="fields" type="text" id="firstname" name="firstname" placeholder="">
          <h2>Επώνυμο</h2>
          <input class="fields" type="text" id="lastname" name="lastname" placeholder="">
          <h2>Όνομα Χρήστη*</h2>
          <input class="fields" type="text" id="username" name="username" placeholder="">
          <h2>Email*</h2>
          <input class="fields" type="email" id="email" name="email" placeholder="example@gmail.com">
          <h2>Κωδικός*</h2>
          <input class="fields" type="password" id="password" name="password" placeholder="Όρισε τον κωδικό σου">

          <a href="login.php" id="have-account">Έχω ήδη λογαριασμό</a>
          <a id="create-btn" href="##"><button type="submit">Δημιουργία</button></a>
        </form>

        <?php
          include("dbconnection.php");

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $flag = true;
            if (!empty($_POST["firstname"])){
              $firstname = test_input($_POST["firstname"]);
              if (!preg_match('/^[\\s\\p{Greek}]+$/u',$firstname)) {
                $firstnameErr = "Only letters and white space allowed";
                $flag = false;
              }
            } else {
              $flag = false;
            }

            if (!empty($_POST["lastname"])){
              $lastname = test_input($_POST["lastname"]);
              if (!preg_match('/^[\\s\\p{Greek}]+$/u',$lastname)) {     //  "/^[a-zA-Z\\p{L}-' ]*$/u"
                $lastnameErr = "Only letters and white space allowed";
                $flag = false;
              }
            } else {
              $flag = false;
            }

            if (!empty($_POST["username"])){
              $username = htmlspecialchars($_POST["username"]);
            } else {
              $flag = false;
            }

            if (!empty($_POST["email"])){
              $email = test_input($_POST["email"]);
            } else {
              $flag = false;
            }

            if (!empty($_POST["password"])){
              $password = $_POST["password"];
            } else {
              $flag = false;
            }


            if ($flag){ // everything is fine to proceed and add the new User
              $sql = "INSERT INTO Users (firstname, lastname, username, email, password)
                      VALUES ('".$firstname."', '".$lastname."','". $username."','". $email."','". $password."')";
              if ($conn->query($sql) == true) {
                // New record created successfully
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["username"] = $username;
                header("Location: index.php");
              } else {
                echo "Ο λογαριασμός αυτός δεν μπόρεσε να δημιουργηθεί.<br>
                      Παρακαλώ δοκιμάστε αργότερα";
              }
            } else {
              echo "<br><br><br><br><h3>Πρέπει να συμπληρώσεις όλα τα στοιχεία.</h3>";
            }

          }

          $conn->close(); // Close database connection


          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
         ?>

    </div>
</div>


</body>
</html>

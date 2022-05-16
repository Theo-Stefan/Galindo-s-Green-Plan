<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleLogin.css">
  </head>
  <body>
    <?php include("HTML/header.html"); ?>

    <div id="main">
        <div id="white-cover">
            <h1>Σύνδεση στον λογαριασμό μου</h1>

            <h2>Email</h2>

            <form action="login.php" method="post">
              <input class="fields" type="email" id="email" name="email" placeholder="example@gmail.com">
              <h2>Κωδικός</h2>
              <input class="fields" type="password" id="password" name="password" placeholder="Κωδικός">
              <a href="forgotPassword.php" id="forgot-password">Ξέχασα τον κωδικό μου</a>
              <a href="createAccount.php" id="create-account">Δημιουργία λογαριασμού</a>
              <a id="login-btn"  href="##"><button type="submit" name="submit_button">Είσοδος</button></a>
            </form>

            <?php


              if (isset($email) && isset($password) ){
                echo "<br><br>Email: ". $email. " && password:". $password;
              }

              include("dbconnection.php");

              $sql = "SELECT email, password, username, ismod FROM Users";
              $result = $conn->query($sql);

              // Inputs logic
              if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if ((empty($_POST["email"]) || empty($_POST["password"]) ) && empty($_POST["submit_button"]) ){
                  //echo "email empty";
                  $error_msg = "<br><br><br><span class=\"error\">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please Enter both email and password!
                                </span>";
                } else {
                  $email = test_input($_POST["email"]);
                  $password = $_POST["password"];
                }

                if (!empty($email) && !empty($password)) {
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      if ($row["email"] == $email && $row["password"] == $password) {
                        session_start();
                        $_SESSION["email"] = $email;
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["ismod"] = $row["ismod"];
                        header("Location: index.php");
                      }

                      $error_msg = "<br><br><br>
                      Λάθος email ή κωδικός! Παρακαλώ ελέγξτε τα στοιχεία σας.";
                    }

                  } else {
                    $error_msg = "<br><br><br>
                    Δεν υπάρχει κανένας ενεργός χρήστης! Το συστημά εχεί καταρεύσει! Παρακαλώ δοκιμάστε αργότερα!";
                  }

                }

                echo $error_msg;
              }


              $conn->close();

              // Removing double spaces, slashes "\" and html tags and etc.
              function test_input($data){
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

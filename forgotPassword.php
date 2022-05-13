<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="styleForgotPassword.css">
</head>
<body>
  <?php include("header.html");?>

  <div id="main">
      <div id="white-cover">
          <h1>Ξέχασες τον κωδικό σου;</h1>

          <h2>Συμπλήρωσε εδώ το email του λογαριασμού σου και θα σου στείλουμε ένα email με το κωδικό σου.</h2>
          <form method="post" action="forgotPassword.php">
            <input class="fields" type="email" id="email" name="forgotten_email" placeholder="example@gmail.com">


            <a id="send-btn" href="##"><button type="submit">Αποστολή</button></a>
          </form>

          <?php
            include("dbconnection.php");

            $sql = "SELECT email, password FROM Users";
            $result = $conn->query($sql);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (!empty($_POST["forgotten_email"])){
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    if ($row["email"] == $_POST["forgotten_email"]) {
                      mail($_POST["forgotten_email"],"Forgotten Password(Galindo's Plan)",
                      "Your password to our website is: ".$row["password"]."\n This message is just a reminder.",
                      "From: galindosplan@gmail.com\r\n");
                      $error_msg = "Το email στάλθηκε με επιτυχία!";
                      break;
                    }

                    $error_msg = "<br><br><br>
                    Λάθος email! Παρακαλώ ελέγξτε τα στοιχεία σας.";
                  }

                } else {
                  $error_msg = "<br><br><br>
                  Δεν υπάρχει κανένας ενεργός χρήστης! Το συστημά εχεί καταρεύσει! Παρακαλώ δοκιμάστε αργότερα!";
                }
              } else {
                $error_msg = "<br><br><br>
                Παρακαλώ συμπληρώστε ένα email!";
              }

              echo $error_msg;
            }

            $conn->close();
           ?>






      </div>
  </div>


</body>
</html>

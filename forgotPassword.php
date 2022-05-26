<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleForgotPassword.css">
</head>
<body>
  <?php include("HTML/header.html");?>

  <div id="main">
      <div id="white-cover">
          <h1>Ξέχασες τον κωδικό σου;</h1>

          <h2>Συμπλήρωσε εδώ το email του λογαριασμού σου και θα σου στείλουμε ένα email με το κωδικό σου.</h2>
          <form method="post" action="forgotPassword.php">
            <input class="fields" type="email" id="email" name="forgotten_email" placeholder="example@gmail.com">


            <a id="send-btn" href="##"><button type="submit" name="forgotPasswordButton">Αποστολή</button></a>
          </form>

          <?php
            include("dbconnection.php");
            $error_msg ="";

            $sql = "SELECT email, password FROM Users";
            $result = $conn->query($sql);

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $email = $_POST["forgotten_email"];
              $title = "Forgotten Password(Galindo's Plan)";

              if (!empty($_POST["forgotten_email"])){
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    if ($row["email"] == $_POST["forgotten_email"]) {
                      $msg = "Your password to our website is: ".$row["password"]."\n This message is just a reminder.";
                      $myfile = fopen("emailfile.txt", "w") or $error_msg.="no email for today.<br>System down<br>";
                      fwrite($myfile, "$email\n$title\n$msg");;
                      fclose($myfile);
                      $command = escapeshellcmd("python email_sender.py emailfile.txt");
                      $result = shell_exec($command);
                      //$feedback .= "result:".$result."<br>";
                      if($result){
                        $error_msg .= "Το μυνημά σας στάλθηκε!<br>";
                      } else {
                        $error_msg .= "Error occured during the send process<br>
                        please try again<br>";
                      }
                      break;
                    }

                    $error_msg .= "<br><br><br>
                    Λάθος email! Παρακαλώ ελέγξτε τα στοιχεία σας.";
                  }

                } else {
                  $error_msg .= "<br><br><br>
                  Δεν υπάρχει κανένας ενεργός χρήστης! Το συστημά εχεί καταρεύσει! Παρακαλώ δοκιμάστε αργότερα!";
                }
              } else {
                $error_msg = "<br><br><br>
                Παρακαλώ συμπληρώστε ένα email!";
              }

              echo "<br><br><h2>$error_msg</h2>";
            }

            $conn->close();
           ?>

      </div>

  </div>


</body>
</html>

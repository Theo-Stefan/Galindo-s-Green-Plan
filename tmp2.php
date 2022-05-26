<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    // Table: News
    // Columns: id, title, description, date, url, image, priority
      include("dbconnection.php");

      // $sql ="CREATE TABLE News (
      //         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      //         title VARCHAR(255) NOT NULL,
      //         description VARCHAR(2047) NOT NULL,
      //         date DATE NOT NULL,
      //         url VARCHAR(255),
      //         image VARCHAR(255) NOT NULL DEFAULT 'jan-huber-4OhFZSAT3sw-unsplash.jpg',
      //         priority INT(6) NOT NULL UNIQUE
      //       )";

      // $sql = "INSERT INTO News (title, description, date, url, image, priority)
      //         VALUES ('Τα αλλεπάλληλα ρεκόρ στις ανανεώσιμες πηγές ενέργειας και το όφελος για την Ελλάδα', 'Σπάνε το ένα ρεκόρ μετά το άλλο οι ανανεώσιμες πηγές ενέργειας,
      //           τόσο σε επενδυτικό επίπεδο όσο και στην κάλυψη της ζήτησης.
      //           Κατά το διήμερο 1ης και 2ας Απριλίου οι πράσινες τεχνολογίες κάλυψαν το
      //           67% και 68% αντίστοιχα των ενεργειακών αναγκών της χώρας, μεγέθη που αποτελούν νέο ρεκόρ.
      //           Είναι χαρακτηριστικό της δυναμικής των ΑΠΕ επίσης, το γεγονός
      //           ότι στις 2 Απριλίου επίσης για πρώτη φορά έγινε και απόρριψη ισχύος 500
      //           μεγαβάτ από ανανεώσιμες πηγές, για λόγους ευστάθειας του δικτύου. Αυτό σημαίνει ότι
      //           αν υπήρχε η δυνατότητα απορρόφησης αυτών των μεγεθών, η διείσδυση των ΑΠΕ θα ήταν
      //           ακόμα μεγαλύτερη, γεγονός που αναδεικνύει τη σημασία της αποθήκευσης ενέργειας.', '2022-04-17',
      //           'https://www.cnn.gr/ellada/story/309006/perivallon-ta-allepallila-rekor-stis-ananeosimes-piges-energeias-kai-to-ofelos-gia-tin-ellada',
      //           'ananeosimes-piges-energeias.jpg', 3);";

      // if ($conn->query($sql) == true){
      //   echo "added to table";
      // } else {
      //   echo "error occured";
      //
      $valid_types = ["tiff", "tif", "jpg", "jpeg", "gif", "png"];
      $str ="hello.jpg.tiffpng";
      $result = explode(".", $str);

      $type =$result[count($result)-1];
  print_r(explode(".", $str));
      echo in_array($type, $valid_types);



      $conn->close();


    ?>

  </body>
</html>

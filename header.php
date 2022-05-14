<header>
  <a href="index.php"><img class="logo" src="logos/Galindo's%20Green%20Plan%20logo%202.png" height="75" alt="logo"></a>
  <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Αναζήτηση...">
      <a class="search-btn" href="#">
          <img src="other%20images/search%20icon.png" height="20">
      </a>
  </div>
  <nav>
      <ul class="nav_links">
          <li><a href="index.php">ΑΡΧΙΚΗ</a> </li>
          <li><a href="about.php">ΣΧΕΤΙΚΑ</a> </li>
          <li><a href="news.php">ΝΕΑ</a> </li>
          <li><a href="events.php">ΕΚΔΗΛΩΣΕΙΣ</a> </li>
          <li><a href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a> </li>
      </ul>
  </nav>
  <a class="cta"><?php echo $_SESSION["username"];?></a>
  <form method="post" action="index.php">
    <input href="index.php" name="logout_button" type="submit" value="Αποσύνδεση">
  </form>
</header>

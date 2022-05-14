<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="styleNews.css">
</head>
<body>
  <?php include("headerSelection"); ?>

<div class="main">
    <h1>Τι νέο υπάρχει</h1>

    <div class="image-container">
        <div class="image"><img src="images/42046696101.jpg" alt="image" onclick="showImage('pic1');"> <p>Τρύπα του όζοντος τον Σεπτέμβριο</p></div>
        <div class="image"><img src="images/Jeep-Compass-Trailhawk-and-S-4xe.jpg" alt="image" onclick="showImage('pic2');"> <p>Jeep: Πρόγραμμα επιβράβευσης της φιλικής στο περιβάλλον οδήγησης</p></div>
        <div class="image"><img src="images/ananeosimes-piges-energeias.jpg" alt="image" onclick="showImage('pic3');"> <p>Τα αλλεπάλληλα ρεκόρ στις ανανεώσιμες πηγές ενέργειας και το όφελος για την Ελλάδα</p></div>
        <div class="image"><img src="images/laxeio.jpg" alt="image" onclick="showImage('pic4');"> <p>Γάλλος κέρδισε 199 εκατ. ευρώ και τα διαθέτει για τη σωτηρία του πλανήτη</p></div>
        <div class="image"><img src="images/pollusion-AP22094423918172.jpg" alt="image" onclick="showImage('pic5');"> <p>Ρύπανση: Μικροπλαστικά σωματίδια «ταξίδεψαν» από το περιβάλλον στους ανθρώπινους πνεύμονες</p></div>
        <div class="image"><img src="images/planet.jpg" alt="image" onclick="showImage('pic6');"> <p>Η αύξηση της θερμοκρασίας στον πλανήτη θα κυμανθεί ανάμεσα σε 1,5 και 2 βαθμούς Κελσίου</p></div>
        <div class="image"><img src="images/5502080072_88f8bf89ed_b.jpg" alt="image" onclick="showImage('pic7');"> <p>Έχουμε πολλές προστατευόμενες περιοχές στην Ελλάδα;</p></div>
        <div class="image"><img src="images/wefwfdswefg.jpg" alt="image" onclick="showImage('pic8');"> <p>Για κάθε αυτοκίνητο που διαθέτει, η LeasePlan Hellas επιστρέφει στο περιβάλλον</p></div>
    </div>


    <!--text box for pic1-->
    <div class="popup-window" id="pic1">
        <div class="close-btn" onclick="closeImage('pic1')">&times;</div>
        <div class="white-board">
            <h2>Τρύπα του όζοντος τον Σεπτέμβριο</h2>
            <p> 16.09.2021<br>
                Η τρύπα στο στρώμα του όζοντος στην ατμόσφαιρα, που σχηματίζεται
                κάθε χρόνο πάνω από τον Νότιο Πόλο, έχει φέτος τον Σεπτέμβριο μεγαλώσει
                κατά 75% περισσότερο σε σχέση με κάθε άλλη χρονιά τέτοια εποχή από το 1979
                και είναι πια μεγαλύτερη ακόμη και από την Ανταρκτική.
            </p>
            <p class="text-source">Πηγή: https://www.tovima.gr/2021/09/16/science/trypa-tou-ozontos-ayto-ton-septemvrio-einai-megalyteri-kai-apo-tin-antarktiki/</p>
        </div>
    </div>

    <!--text box for pic2-->
    <div class="popup-window" id="pic2">
        <div class="close-btn" onclick="closeImage('pic2')">&times;</div>
        <div class="white-board">
            <h2>Jeep: Πρόγραμμα επιβράβευσης της φιλικής στο περιβάλλον οδήγησης</h2>
            <p>Μετά την παρουσίαση το Μάρτιο του 2021 με το
                νέο αμιγώς ηλεκτρικό Fiat 500, το πρόγραμμα επιβράβευσης της Kiri
                επεκτείνεται και στην Plug-in Hybrid γκάμα Jeep 4xe. Η πρωτοβουλία που αναπτύχθηκε
                από τo Stellantis e-Mobility Business Unit και την Kiri Technologies προωθεί την
                φιλική προς το περιβάλλον οδήγηση, προσφέροντας παράλληλα προνόμια στους οδηγούς
                που ακολουθούν αυτή τη λογική στις μετακινήσεις τους.
            </p>
            <p class="text-source">Πηγή: https://www.4troxoi.gr/epikairotita/kosmos/jeep-programma-epivraveysis-tis-filikis-sto-perivallon-odigisis/</p>
        </div>
    </div>

    <!--text box for pic3-->
    <div class="popup-window" id="pic3">
        <div class="close-btn" onclick="closeImage('pic3')">&times;</div>
        <div class="white-board">
            <h2>Τα αλλεπάλληλα ρεκόρ στις ανανεώσιμες πηγές ενέργειας και το όφελος για την Ελλάδα</h2>
            <p>Σπάνε το ένα ρεκόρ μετά το άλλο οι ανανεώσιμες πηγές ενέργειας,
                τόσο σε επενδυτικό επίπεδο όσο και στην κάλυψη της ζήτησης.
                Κατά το διήμερο 1ης και 2ας Απριλίου οι πράσινες τεχνολογίες κάλυψαν το
                67% και 68% αντίστοιχα των ενεργειακών αναγκών της χώρας, μεγέθη που αποτελούν νέο ρεκόρ.
                Είναι χαρακτηριστικό της δυναμικής των ΑΠΕ επίσης, το γεγονός
                ότι στις 2 Απριλίου επίσης για πρώτη φορά έγινε και απόρριψη ισχύος 500
                μεγαβάτ από ανανεώσιμες πηγές, για λόγους ευστάθειας του δικτύου. Αυτό σημαίνει ότι
                αν υπήρχε η δυνατότητα απορρόφησης αυτών των μεγεθών, η διείσδυση των ΑΠΕ θα ήταν
                ακόμα μεγαλύτερη, γεγονός που αναδεικνύει τη σημασία της αποθήκευσης ενέργειας.
            </p>
            <p class="text-source">Πηγή: https://www.cnn.gr/ellada/story/309006/perivallon-ta-allepallila-rekor-stis-ananeosimes-piges-energeias-kai-to-ofelos-gia-tin-ellada</p>
        </div>
    </div>

    <!--text box for pic4-->
    <div class="popup-window" id="pic4">
        <div class="close-btn" onclick="closeImage('pic4')">&times;</div>
        <div class="white-board">
            <h2>Γάλλος κέρδισε 199 εκατ. ευρώ και τα διαθέτει για τη σωτηρία του πλανήτη</h2>
            <p>Ένας υπερτυχερός Γάλλος κέρδισε το ιλιγγιώδες ποσό των 199 εκατ. ευρώ στο
                τζακ ποτ και αντί να τα ξοδέψει για μια άνετη και γεμάτη χλιδή ζωή, τα
                δώρισε για την δημιουργία ενός ιδρύματος για την προστασία του περιβάλλοντος.<br>
                Ο νικητής, με το παρατσούκλι «Guy» που του δόθηκε από τον γαλλικό όμιλο
                λοταρίας Françaises des Jeux (FDJ), κέρδισε τα χρήματα τον Δεκέμβριο του 2020.
            </p>
            <p class="text-source">Πηγή: https://www.cnn.gr/kosmos/story/308157/laxeio-gia-to-perivallon-gallos-kerdise-199-ekat-eyro-kai-ta-diathetei-gia-ti-sotiria-toy-planiti</p>
        </div>
    </div>

    <!--text box for pic5-->
    <div class="popup-window" id="pic5">
        <div class="close-btn" onclick="closeImage('pic5')">&times;</div>
        <div class="white-board">
            <h2>Ρύπανση: Μικροπλαστικά σωματίδια «ταξίδεψαν» από το περιβάλλον στους ανθρώπινους πνεύμονες</h2>
            <p>Μικροπλαστικά σωματίδια πέρασαν για πρώτη φορά από
                το περιβάλλον στους ανθρώπινους πνεύμονες, όπως καταδεικνύει ανάλυση ιστολογικών δειγμάτων.
                Τα σωματίδια βρέθηκαν σχεδόν σε όλα τα δείγματα που αναλύθηκαν, με
                τους επιστήμονες να εκφράζουν ανησυχία για τις επιπτώσεις στην υγεία των πολιτών
                καθώς διαπιστώνουν ότι η ρύπανση είναι πλέον πανταχού παρούσα σε ολόκληρο τον πλανήτη
                και καθιστά την ανθρώπινη έκθεση αναπόφευκτη.
            </p>
            <p class="text-source">Πηγή: https://www.cnn.gr/kosmos/story/308284/rypansi-mikroplastika-somatidia-taxidepsan-apo-to-perivallon-stoys-anthropinoys-pneymones</p>
        </div>
    </div>

    <!--text box for pic6-->
    <div class="popup-window" id="pic6">
        <div class="close-btn" onclick="closeImage('pic6')">&times;</div>
        <div class="white-board">
            <h2>Η αύξηση της θερμοκρασίας στον πλανήτη θα κυμανθεί ανάμεσα σε 1,5 και 2 βαθμούς Κελσίου</h2>
            <p>Aν οι χώρες του πλανήτη τηρήσουν πλήρως και
                έγκαιρα όλες τις δεσμεύσεις τους για μείωση των εκπομπών άνθρακα
                που έκαναν στη διεθνή συνδιάσκεψη της Γλασκόβης το 2021, τότε υπάρχει ακόμη
                βάσιμη πιθανότητα η άνοδος της θερμοκρασίας να μην ξεπεράσει το όριο των δύο
                βαθμών Κελσίου έως το 2100 (θα αυξηθεί κατά 1,9 έως 2 βαθμούς σε σχέση με τα προβιομηχανικά επίπεδα).
            </p>
            <p class="text-source">Πηγή: https://www.cnn.gr/kosmos/story/308684/perivallon-h-ayxisi-tis-thermokrasias-ston-planiti-tha-kymanthei-anamesa-se-1-5-kai-2-vathmoys-kelsioy</p>
        </div>
    </div>

    <!--text box for pic7-->
    <div class="popup-window" id="pic7">
        <div class="close-btn" onclick="closeImage('pic7')">&times;</div>
        <div class="white-board">
            <h2>Έχουμε πολλές προστατευόμενες περιοχές στην Ελλάδα;</h2>
            <p>Η συζήτηση στην Ελλάδα για το περιβάλλον περιστρέφεται αποκλειστικά
                γύρω από την κλιματική αλλαγή, την επιδίωξη ανάπτυξης των ΑΠΕ και τον περιορισμό
                της κλιματικής αλλαγής. Στο πλαίσιο της επιδίωξης περιορισμού των εκπομπών διοξειδίου
                του άνθρακα, ενεργειακής αυτάρκειας αλλά και σχετικής αυτονομίας προχωρούν και
                οι διαδικασίες για την δημιουργία πυρηνικού εργοστασίου στην Βουλγαρία με την συμμετοχή της Ελλάδας.
            </p>
            <p class="text-source">Πηγή: https://www.huffingtonpost.gr/entry/echoeme-polles-prostateeomenes-perioches-sten-ellada_gr_625d4524e4b052d2bd63fc8b</p>
        </div>
    </div>

    <!--text box for pic8-->
    <div class="popup-window" id="pic8">
        <div class="close-btn" onclick="closeImage('pic8')">&times;</div>
        <div class="white-board">
            <h2>Για κάθε αυτοκίνητο που διαθέτει, η LeasePlan Hellas επιστρέφει στο περιβάλλον</h2>
            <p>Με αφορμή τη συμπλήρωση 40.000 αυτοκινήτων στους ελληνικούς δρόμους,
                η LeasePlan επιστρέφει στο περιβάλλον υλοποιώντας ένα ολοκληρωμένο πρόγραμμα
                με δράσεις δενδροφύτευσης και προστασίας της άγριας ζωής.<br>
                Τα 6.000 δέντρα αναμένεται να απορροφούν 132.000 κιλά διοξείδιο του
                άνθρακα κάθε χρόνο και να απελευθερώνουν 702.000 κιλά οξυγόνου στην ατμόσφαιρα.
                Οι πυρκαγιές, η κλιματική κρίση και η ανθρώπινη δραστηριότητα πλήττουν, φυσικά, και
                την άγρια πανίδα. Έτσι, η LeasePlan αποφάσισε να στηρίξει την ANIMA, τον Σύλλογο Προστασίας
                και Περίθαλψης Άγριας Ζωής, θέλοντας να συνδράμει στο εμβληματικό έργο του οργανισμού
                και των ανθρώπων του για την περίθαλψη και επανένταξη άγριων ζώων – πτηνών, θηλαστικών και
                ερπετών - στο φυσικό τους περιβάλλον.
            </p>
            <p class="text-source">Πηγή: https://www.iefimerida.gr/green/h-leaseplan-hellas-epistrefei-sto-periballon</p>
        </div>
    </div>

</div>

<script>
    function showImage(picture){
        document.getElementById(picture).style.display = "block";
    }

    function closeImage(picture){
        document.getElementById(picture).style.display = "none";
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Galindo's Green Plan</title>
    <link rel="stylesheet" href="CSS/styleEvents.css">
</head>
<body>
    <?php include("headerSelection.php"); ?>

    <div class="main">
        <div class="white-cover">
            <h1>Εκδηλώσεις</h1>

            <div class="image-container">
                <div class="image"><img src="images/there_is_no_planet.jpg" alt="image" onclick="showImage('pic1');"> <p>Διαδήλωση για την μόλυνση του αέρα(Θεσσαλονίκη)</p></div>
                <div class="image"><img src="images/people_clean_beach.jpg" alt="image" onclick="showImage('pic2');"> <p>Εθελοντικός καθαρισμός παραλίας στη Θεσσαλονίκη</p></div>
                <div class="image"><img src="images/plant_tree.jpg" alt="image" onclick="showImage('pic3');"> <p>Δεντροφύτευση στην Εύβοια</p></div>
            </div>
        </div>

        <!--text box for pic1-->
        <div class="popup-window" id="pic1">
            <div class="close-btn" onclick="closeImage('pic1')">&times;</div>
            <div class="white-board">
                <h2>Διαδήλωση για την μόλυνση του αέρα(Θεσσαλονίκη)</h2>
                <p> 05.05.2022<br>
                     Στις 05/05/2022 διοργανόνουμε διαδήλωση για την μόλυνση του αέρα στην πόλη της Θεσσαλονίκης. Τα τελευταία χρόνια οι ειδικοί αναφέρουν ότι η κατάσταση της
                    πόλης όλο ένα και χειροτερεύει. Η διαδήλωση θα πραγματοποιηθεί στις 6:00 μετά μεσημβρίας στην Καμάρα.
                </p>
                <p class="text-source">Πηγή: https://www.athensvoice.gr/environment/754734-imera-tis-gis-2022-poreies-gia-tin-klimatiki-allagi-simera-22-aprilioy</p>

            </div>
            <div class="i-will-go-btn-class"><a id="i-will-go-btn-1" href="##"><button>Θα πάω</button></a></div>
        </div>

        <!--text box for pic2-->
        <div class="popup-window" id="pic2">
            <div class="close-btn" onclick="closeImage('pic2')">&times;</div>
            <div class="white-board">
                <h2>Εθελοντικός καθαρισμός παραλίας στη Θεσσαλονίκη/</h2>
                <p>10.05.2022<br>
                    Διοργανώνουμε δράση εθελοντικού καθαρισμού παραλίας στο Δήμος Θερμαϊκού. Η δράση θα διεξαχθεί στις 10 Μαίου του 2022.
                    Μαζί μας θα είναι και διάφορα σχολεία του δήμου που θα προσφερθούν να βοηθήσουν σε αυτή την σημαντική κίνηση.
                </p>
                <p class="text-source">Πηγή: https://cityportal.gr/ethelontikos-katharismos-paralias-sto-dimo-thermaikoy-kyriaki-10-4/</p>


            </div>
            <div class="i-will-go-btn-class"><a id="i-will-go-btn-2" href="##"><button>Θα πάω</button></a></div>
        </div>

        <!--text box for pic3-->
        <div class="popup-window" id="pic3">
            <div class="close-btn" onclick="closeImage('pic3')">&times;</div>
            <div class="white-board">
                <h2>Δεντροφύτευση στην Εύβοια</h2>
                <p>22.05.2022<br>
                    Μετά τις πυρκαγιές που πλήξανε σημαντικά την βόρια Εύβοια, θεωρήσαμε σαν ομάδα-σελίδα την απαρέτητη διοργάνωση
                    μιας αναδάσωσεις σε ένα κομμάτι των περιοχών. Η αναδάσωση θα πραγματοποιηθεί στις 22 Μαίου του 2022 απο τίς 8 το πρωί μέχρι τις 8 το βράδυ
                    και η βοήθεια όσων μπορέσουν να παρεβρεθούν είναι πολύτιμη.
                </p>
                <p class="text-source">Πηγή: https://parallaximag.gr/thessaloniki-dentrofyteysi-ston-dimo-payloy-mela-136516</p>

            </div>
            <div class="i-will-go-btn-class"><a id="i-will-go-btn-3" href="##"><button>Θα πάω</button></a></div>
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

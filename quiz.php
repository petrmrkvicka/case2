
<!DOCTYPE html>

<?php
//connection credentials
$servername = "sql.endora.cz:3313";
$username = "baaacase2";
$password = "case2BAAA";
$dbname = "baaacase2";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<html lang= "en">

<html>
<head>
	<meta charset="utf-8">
	<title>Antikmuseet</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>

	<a href="studentcode.html"><img class="arrow" src="./images/arrow.svg" alt="arrow"></a>
	<img src="images/ancient-feuds.svg" alt="AU logo">

</header>

<?php

$sql = "SELECT * FROM questions ORDER BY RAND()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"question\" id=\"$row[ID]\">\n";
        echo "<img src=\"images/$row[picture_src]\">\n";
        echo "<h2 class=\"booom\">$row[question]</h2>\n";
        echo "<button class=\"blue\"";
            if($row['rightAnswer']==1){
              echo " onclick=\"right()\"";}
              else {echo " onclick=\"wrong()\"";}
        echo ">$row[answer1]</button>\n";

        echo "<button class=\"blue\"";
            if($row['rightAnswer']==2){
              echo " onclick=\"right()\"";}
              else {echo " onclick=\"wrong()\"";}
        echo ">$row[answer2]</button>\n";

        echo "<button class=\"blue\"";
            if($row['rightAnswer']==3){
              echo " onclick=\"right()\"";}
              else {echo " onclick=\"wrong()\"";}
        echo ">$row[answer3]</button>\n";


        //right
        echo "<div class=\"theRightAnswerDiv\">";
        echo "<h3>YOU NERD!</h3>";
        echo "<p>Clytios (Klytios) was one of the Giants, sons of Gaia, killed by Hecate during the Gigantomachy, the battle of the Giants versus the Olympian gods. He was powerful beyond defeat and unsurpassed in bodily size. He and his brothers would hurl flaming trees and rocks into the heavens to attack the gods</p>";
        echo "<button>CONTINUE</button></div>\n";

        //wrong
        echo "<div class=\"theWrongAnswerDiv\">";
        echo "<h3>YOU SUCK!</h3>";
        echo "<p>The right answer is of course <b>$row[rightAnswerText]</b></p>";
        echo "<p>Clytios (Klytios) was one of the Giants, sons of Gaia, killed by Hecate during the Gigantomachy, the battle of the Giants versus the Olympian gods. He was powerful beyond defeat and unsurpassed in bodily size. He and his brothers would hurl flaming trees and rocks into the heavens to attack the gods</p>";
        echo "<button>CONTINUE</button></div>\n\n";



    }

}


?>


</body>
</html>

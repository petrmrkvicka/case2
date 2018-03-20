
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

<html lang="en">

<html>
<head>
	<meta charset="utf-8">
	<title>Antikmuseet</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>

	<a href="studentcode.html"><img class="arrow" src="./images/arrow.svg" alt="arrow"></a>
	<img src="images/ancient-feuds.svg" alt="AU logo">

</header>

<?php
$i = 1;
$sql = "SELECT * FROM questions ORDER BY RAND()";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

      //displays a div with elements in it (such as img, headings and buttons)
        echo "<div class=\"questionDiv\" id=\"$row[ID]\">\n";
        echo "<img src=\"images/$row[picture_src]\">\n";
        echo "<h3>$row[question]</h3>\n";


// Displays 3 buttons
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



        //Displays right answer screen
        echo "<div class=\"theRightAnswerDiv rA$i\">";
        echo "<h3>YOU NERD!</h3>";
        echo "<p>$row[descr]</p>";
        echo "<button onclick=\"nextQuestion()\">CONTINUE</button></div>\n";


        //Displays wrong answer screen
        echo "<div class=\"theWrongAnswerDiv wA$i\">";
        echo "<h3>YOU SUCK!</h3>";
        echo "<p>The right answer is of course <b>$row[rightAnswerText]</b></p>";
	    echo "<br><br>";
        echo "<p>$row[descr]</p>";
        echo "<button onclick=\"nextQuestion()\">CONTINUE</button></div>\n\n";

        echo "</div>";

        $i = $i + 1;
    }
}
?>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script>


  var counter = 0;
  var questions = $(".questionDiv");
  var rightAnswers = $(".theRightAnswerDiv");
  var wrongAnswers = $(".theWrongAnswerDiv");
  var header = $("header");
  questions.hide();
  rightAnswers.hide();
  wrongAnswers.hide();
  questions.eq(counter).show();







function right() {
  rightAnswers.eq(counter).show();
  rightAnswers.eq(counter).css({
    "position":"fixed",
    "top":0,
    "left":0,
    "right":0,
    "bottom":0,
    "background":"rgba(32,120,1,0.8)"
  });

header.css({
  "filter":"blur(10px)"
});

questions.eq(counter).children().not(rightAnswers.eq(counter)).css({
  "filter":"blur(10px)"
});
}

function wrong() {
  wrongAnswers.eq(counter).show();
  wrongAnswers.eq(counter).css({
    "position":"fixed",
    "top":0,
    "left":0,
    "right":0,
    "bottom":0,
    "background":"rgba(143,17,0,0.8)"
  });

    header.css({
      "filter":"blur(10px)"
    });

    questions.eq(counter).children().not(wrongAnswers.eq(counter)).css({
      "filter":"blur(10px)"
    });
}

function nextQuestion() {
  questions.hide();
  counter++;
  questions.eq(counter).show();
  header.css({"filter":"blur(0px)"});
}


  </script>

</body>
</html>

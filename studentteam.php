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

$hash = $_COOKIE['hash'];

$sql = "SELECT * FROM class WHERE hash='$hash'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $className = $row["class_name"];
			}}


?>


<!DOCTYPE html>
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
<form action="studentTeamProceed.php" method="GET">
<h2> Create your team for class <?php echo $className;?></h2>
<input type="text" name="team_name" placeholder="Name your team" required> <br>

<h3> Add your classmates <h3>
  <input type="text" name="team_member1" placeholder="Team member 1" required> <br>
  <input type="text" name="team_member2" placeholder="Team member 2"> <br>
  <input type="text" name="team_member3" placeholder="Team member 3"> <br>
  <button class="+"> + </button> <br>

<input type="submit" class="blue button" value="CREATE NEW TEAM"><br>
</form>



</body>
</html>

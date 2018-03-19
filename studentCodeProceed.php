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

$hash = $_GET['Code'];

$sql1 = "SELECT * FROM class WHERE hash = '$hash'";
$result1 = mysql_query($sql1);

if (mysql_num_rows($result1)==1) {
  setcookie("hash", "$hash");
header("Location: studentteam.html");
die;
}
else{
  alert("This class doesn't exist");
  header("Location: studentcode.html");
}

?>

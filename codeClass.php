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


$className = $_GET['className'];
$email = $_GET['email'];

//creates a random number between 100000 and 999999 to get af random 6 digit number
$hash = (rand(100000,999999));


$sql = "INSERT INTO class (ID, hash, class_name, email)
VALUES (0, '$hash', '$className', '$email')";


if ($conn->query($sql) === TRUE) {
  header("Location: teachercode.php?hash=$hash");
die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





?>




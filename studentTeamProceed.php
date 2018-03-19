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
$teamName = $_GET['team_name'];
$teamMember1 = $_GET['team_member1'];
$teamMember2 = $_GET['team_member2'];
$teamMember3 = $_GET['team_member3'];
 $teamMembers = $teamMember1.",".$teamMember2.",".$teamMember3;


$sql = "SELECT * FROM class WHERE hash='$hash'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $classID = $row["ID"];
			}}


      $sql = "INSERT INTO team (ID, classID, team_name, names)
      VALUES (0, '$classID', '$teamName', '$teamMembers')";





      if ($conn->query($sql) === TRUE) {

        $sql = "SELECT * FROM team WHERE names='$teamMembers' AND team_name='$teamName'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $teamID = $row["ID"];
              }}
        setcookie("teamID", "$teamID");
        header("Location: information.html");
      die();
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }










?>

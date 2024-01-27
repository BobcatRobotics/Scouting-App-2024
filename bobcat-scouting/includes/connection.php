<?php
//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost','root','','scouting');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
mysqli_set_charset($mysqli, "utf8");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

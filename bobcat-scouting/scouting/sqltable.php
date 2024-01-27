<?php
require_once '../includes/connection.php';

if ($_SESSION['admin']==0){
    header('Location: ../login.php');
    exit;
}

$querypre = "SELECT name, time FROM form";
$resultpre = $mysqli->query($querypre);

if ($resultpre->num_rows > 0) {
while ($rowpre = $resultpre->fetch_assoc()) {

echo $rowpre['time'] . str_replace(' ', '', strtolower( $rowpre['name'] )) . ' VARCHAR(255),' . '<br>';

}};

?>
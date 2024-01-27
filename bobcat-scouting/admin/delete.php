<?php
session_start();
include '../includes/connection.php';
require_once 'adminconfirm.php';

$sql = 'TRUNCATE TABLE sdata';
$mysqli->query($sql);
header('Location: admin.php');
exit;
?>
<?php 
session_start();
require_once 'adminconfirm.php';
// Load the database configuration file 
include_once '../includes/connection.php';
 
// Fetch records from database 
// $query = $mysqli->query("SELECT * FROM sdata ORDER BY id ASC"); 
 
// if($query->num_rows > 0){ 
//     $delimiter = ","; 
//     $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
//     // Create a file pointer 
//     $f = fopen('php://memory', 'w'); 
     
//     // Set column headers 
//     $fields = array('id', 'field1', 'field2'); 
//     fputcsv($f, $fields, $delimiter); 
     
//     // Output each row of the data, format line as csv and write to file pointer 
//     while($row = $query->fetch_assoc()){ 
//         $lineData = array($row['id'], $row['field1'], $row['field2']); 
//         fputcsv($f, $lineData, $delimiter); 
//     } 
     
//     // Move back to beginning of file 
//     fseek($f, 0); 
     
//     // Set headers to download file rather than displayed 
//     header('Content-Type: text/csv'); 
//     header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
//     //output all remaining data on a file pointer 
//     fpassthru($f); 
// } 
// exit; 



$sql001 = "SELECT COLUMN_NAME\n"

. "  FROM INFORMATION_SCHEMA.COLUMNS\n"

. "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata_backup'";

$result001 = $mysqli->query($sql001);

if ($result001->num_rows > 0) {
while($row001 = $result001->fetch_array()) {


    $sub_array[] = $row001['COLUMN_NAME'];



}
};


// get data
$query = "SELECT * FROM sdata_backup";
if (!$result = mysqli_query($mysqli, $query)) {
    exit(mysqli_error($mysqli));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
;}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Scouting Data Backup.csv');
$output = fopen('php://output', 'w');
fputcsv($output, $sub_array);

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
};
exit;

?>
<?php

//fetch.php
//require_once '../adminconfirm.php';

include('../database_connection.php');
include('../../includes/connection.php');



$sql0011 = "SELECT COLUMN_NAME\n"

. "  FROM INFORMATION_SCHEMA.COLUMNS\n"

. "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";

$result0011 = $mysqli->query($sql0011);

if ($result0011->num_rows > 0) {
while($row0011 = $result0011->fetch_array()) {


    $column[] = $row0011['COLUMN_NAME'];
 

    

}};

array_shift($column);


// $column = array("id", "field1", "field2");

$query = "SELECT * FROM sdata ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE `name` LIKE "%'.$_POST["search"]["value"].'%" 
 OR `match` LIKE "%'.$_POST["search"]["value"].'%" 
 OR `team` LIKE "%'.$_POST["search"]["value"].'%" 

 ';
}

if(isset($_POST["order"]) && $_POST["order"]!='level')
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY `match` ASC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{


 $sub_array = array();

 $sql001 = "SELECT COLUMN_NAME\n"

. "  FROM INFORMATION_SCHEMA.COLUMNS\n"

. "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";

$result001 = $mysqli->query($sql001);

if ($result001->num_rows > 0) {
while($row001 = $result001->fetch_array()) {



    $sub_array[] = $row[$row001['COLUMN_NAME']];


}};

//array_shift($sub_array);


//  $sub_array[] = $row['id'];
//  $sub_array[] = $row['field1'];
//  $sub_array[] = $row['field2'];

 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM sdata";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

// echo $query;

?>
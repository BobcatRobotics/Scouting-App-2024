<?php

//fetch.php
//require_once '../adminconfirm.php';

include('../database_connection.php');

$column = array("username", "first_name", "last_name", "email", "admin", "scouter");

$query = "SELECT * FROM users ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE first_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR last_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR email LIKE "%'.$_POST["search"]["value"].'%" 

 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY username ASC ';
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

    if ($row['admin']==1){
        $admin1='Yes';
    }
    else{
        $admin1='No';
    }


    if ($row['scouter']==1){
        $scouter1='Yes';
    }
    else{
        $scouter1='No';
    }

 $sub_array = array();
 $sub_array[] = $row['username'];
 $sub_array[] = $row['first_name'];
 $sub_array[] = $row['last_name'];
 $sub_array[] = $row['email'];
 $sub_array[] = $admin1;
 $sub_array[] = $scouter1;
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM users";
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

?>
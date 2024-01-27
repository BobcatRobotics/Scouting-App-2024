<?php

//action.php
//require_once '../adminconfirm.php';

include('../database_connection.php');

if($_POST['action'] == 'edit')
{


// $_POST['admin'] = $admin;

    // if ($_POST['admin']=='yes'){
    //     $admin='1';

    // }
    // else {
    //     $admin='0';
    // }

 $data = array(
  ':first_name'  => $_POST['first_name'],
  ':last_name'  => $_POST['last_name'],
  ':email'   => $_POST['email'],
  ':admin'   => $_POST['admin'],
  ':scouter'   => $_POST['scouter'],

  ':username' => $_POST['username']
    

);



 $query = '
 UPDATE users 
 SET first_name = :first_name, 
 last_name = :last_name, 
 email = :email,
 admin = :admin,
 scouter = :scouter
 WHERE username = :username
 ';
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM users 
 WHERE username = '".$_POST["username"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>
<?php

//action.php
//require_once '../adminconfirm.php';

include('../database_connection.php');
include '../../includes/connection.php';

$sql = "SELECT COLUMN_NAME\n"

    . "  FROM INFORMATION_SCHEMA.COLUMNS\n"

    . "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";


    $result1 = $mysqli->query($sql); 
                    if ($result1->num_rows > 0) {
                      while($row1 = $result1->fetch_array()) {
                
                        
                        // echo '":' .$row1['COLUMN_NAME']. '" => $_POST["' .$row1['COLUMN_NAME']. '"],';
                        echo '<br>';
                        echo $row1['COLUMN_NAME'] . '= :' .$row1['COLUMN_NAME'] . ',';
                        echo '<br>';


                    }

                };




// if($_POST['action'] == 'edit')
// {



//  $data = array(
//   ":id" => $_POST["id"],
//   ":prematchname" => $_POST["prematchname"],
//   ":prematchmatchnumber" => $_POST["prematchmatchnumber"],
//   ":prematchteamnumber" => $_POST["prematchteamnumber"],
//   ":prematchrobot" => $_POST["prematchrobot"],
//   ":prematchnoshow" => $_POST["prematchnoshow"],
//   ":autostartinglocation" => $_POST["autostartinglocation"],
//   ":autoleftcommunity" => $_POST["autoleftcommunity"],
//   ":autolowcube" => $_POST["autolowcube"],
//   ":automidcube" => $_POST["automidcube"],
//   ":autohighcube" => $_POST["autohighcube"],
//   ":autolowcone" => $_POST["autolowcone"],
//   ":automidcone" => $_POST["automidcone"],
//   ":autohighcone" => $_POST["autohighcone"],
//   ":autochargestationdocked" => $_POST["autochargestationdocked"],
//   ":autochargestationengaged" => $_POST["autochargestationengaged"],
//   ":teleoplowcone" => $_POST["teleoplowcone"],
//   ":endgamestartedbalancing" => $_POST["endgamestartedbalancing"],
//   ":endgameendedbalancing" => $_POST["endgameendedbalancing"],
//   ":endgamenumberofalliancebotsbalanced" => $_POST["endgamenumberofalliancebotsbalanced"],
//   ":postmatchdriverskill" => $_POST["postmatchdriverskill"],
//   ":postmatchdied" => $_POST["postmatchdied"],
//   ":postmatchtippedover" => $_POST["postmatchtippedover"],
//   ":postmatchyellowcard" => $_POST["postmatchyellowcard"],
//   ":postmatchredcard" => $_POST["postmatchredcard"],
//   ":postmatchcomments" => $_POST["postmatchcomments"],
//   ":teleopmidcone" => $_POST["teleopmidcone"],
//   ":teleophighcone" => $_POST["teleophighcone"],
//   ":teleoplowcube" => $_POST["teleoplowcube"],
//   ":teleopmidcube" => $_POST["teleopmidcube"],
//   ":teleophighcube" => $_POST["teleophighcube"],
//   ":teleopchargestationparked" => $_POST["teleopchargestationparked"],
//   ":teleoppickedupconefromfloor(upright)" => $_POST["teleoppickedupconefromfloor(upright)"],
//   ":teleoppickedupconefromfloor(side)" => $_POST["teleoppickedupconefromfloor(side)"],
//   ":teleoppickedupcubefromfloor" => $_POST["teleoppickedupcubefromfloor"],
//   ":teleoppickedupconefromhp" => $_POST["teleoppickedupconefromhp"],
//   ":teleoppickedupcubefromhp" => $_POST["teleoppickedupcubefromhp"],
//   ":teleopwasdefended" => $_POST["teleopwasdefended"],
//   ":teleopplayeddefense" => $_POST["teleopplayeddefense"],
//   ":totalpoints" => $_POST["totalpoints"]
//  );

// $k = array();
// $v = array();

// $k = implode(", ", array_keys($_POST));
// $v = "'".implode("', '", array_values($_POST))."'";

// // echo $k;
// // echo '<br>';
// // echo $v;



// $sql001 = "UPDATE sdata ( $k )
// VALUES ( $v ) WHERE id= '$_POST[id]'";

// // $query001 = "INSERT INTO sdata ( " . implode(', ', array_keys($_POST)) . ")
// //     VALUES (" . implode(', ', array_values($_POST)) . ")";

//     $mysqli->query($sql001);


//  $query = '
//  UPDATE sdata 
//  SET 
//  prematchname= :prematchname,

//  prematchmatchnumber= :prematchmatchnumber,
 
//  prematchteamnumber= :prematchteamnumber,
 
//  prematchrobot= :prematchrobot,
 
//  prematchnoshow= :prematchnoshow,
 
//  autostartinglocation= :autostartinglocation,
 
//  autoleftcommunity= :autoleftcommunity,
 
//  autolowcube= :autolowcube,
 
//  automidcube= :automidcube,
 
//  autohighcube= :autohighcube,
 
//  autolowcone= :autolowcone,
 
//  automidcone= :automidcone,
 
//  autohighcone= :autohighcone,
 
//  autochargestationdocked= :autochargestationdocked,
 
//  autochargestationengaged= :autochargestationengaged,
 
//  teleoplowcone= :teleoplowcone,
 
//  endgamestartedbalancing= :endgamestartedbalancing,
 
//  endgameendedbalancing= :endgameendedbalancing,
 
//  endgamenumberofalliancebotsbalanced= :endgamenumberofalliancebotsbalanced,
 
//  postmatchdriverskill= :postmatchdriverskill,
 
//  postmatchdied= :postmatchdied,
 
//  postmatchtippedover= :postmatchtippedover,
 
//  postmatchyellowcard= :postmatchyellowcard,
 
//  postmatchredcard= :postmatchredcard,
 
//  postmatchcomments= :postmatchcomments,
 
//  teleopmidcone= :teleopmidcone,
 
//  teleophighcone= :teleophighcone,
 
//  teleoplowcube= :teleoplowcube,
 
//  teleopmidcube= :teleopmidcube,
 
//  teleophighcube= :teleophighcube,
 
//  teleopchargestationparked= :teleopchargestationparked,
 
//  teleoppickedupconefromfloor(upright)= :teleoppickedupconefromfloor(upright),
 
//  teleoppickedupconefromfloor(side)= :teleoppickedupconefromfloor(side),
 
//  teleoppickedupcubefromfloor= :teleoppickedupcubefromfloor,
 
//  teleoppickedupconefromhp= :teleoppickedupconefromhp,
 
//  teleoppickedupcubefromhp= :teleoppickedupcubefromhp,
 
//  teleopwasdefended= :teleopwasdefended,
 
//  teleopplayeddefense= :teleopplayeddefense,
 
//  totalpoints= :totalpoints
//  WHERE id = :id
//  ';
//  $statement = $connect->prepare($query);
//  $statement->execute($data);
//  echo json_encode($_POST);
// }

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM sdata 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>
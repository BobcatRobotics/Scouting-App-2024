<?php 
session_start();
require_once '../adminconfirm.php';
require_once '../../includes/connection.php';



// $k = array();
// $v = array();

// $k = implode(", ", array_keys($_POST));
// $v = "'".implode("', '", array_values($_POST))."'";

// // echo $k;
// // echo '<br>';
// // echo $v;

// $id = 1;
// $k = 1;
// $v = 1;

// $sql001 = "UPDATE sdata ('$k')
// VALUES ( '$v' ) WHERE id= '$id'";

// // $query001 = "INSERT INTO sdata ( " . implode(', ', array_keys($_POST)) . ")
// //     VALUES (" . implode(', ', array_values($_POST)) . ")";

//     $mysqli->query($sql001);



?>
<html>
 <head>
  <script src="../../css/jquery.js"></script>
  <link rel="stylesheet" href="../css/bootstrap3.css" />
  <script src="../css/jquerytabledit.js"></script>
  <script src="../css/datatablebootstrap.js"></script>
  <script src="../css/bootstraptabledit.css"></script>  
  <link rel="stylesheet" href="../css/bootstraptabledit.css" />
  <script src="../css/bootstrap3.js"></script>
  <script src="../css/tabledit.js"></script>
  <style>
      /* .panel-heading{
          font-size: 20px;
      }

      .title1{
        color: black;

      } */

table{
  overflow-x: scroll;


}

      td:first-child {     display:none; }

      td:second-child, td:third-child{
position: sticky;

      }

      th{
        position: sticky;
        top: 0;
        background-color: #383838;
        color: white;

      }

  </style>
 </head>
 <body>
  <div class="container">
   <br/>
   <div class="panel panel-default">
   <div class="panel-heading">Scouting Data</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="users" class="table table-bordered table-striped">
       <thead>
        <tr data-tabledit-done="1">

                 <th style="display:none;">ID</th>

<?php

//     $sql = "SELECT name FROM form";
//     $result = $mysqli->query($sql);
    
//     if ($result->num_rows > 0) {
//       while($row = $result->fetch_assoc()) {
    
// ?>

     <!-- <th><?php //echo $row['name']; ?></th> -->

 <?php
//   }};


$sql0011 = "SELECT COLUMN_NAME\n"

. "  FROM INFORMATION_SCHEMA.COLUMNS\n"

. "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";

$result0011 = $mysqli->query($sql0011);

if ($result0011->num_rows > 0) {
while($row0011 = $result0011->fetch_array()) {


    $column[] = $row0011['COLUMN_NAME'];
 



}};

array_shift($column);

foreach ($column as $column1) {
    echo '<th>'.$column1.'</th>';
}


 ?>

        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>

<?php 




// $sql0011 = "SELECT COLUMN_NAME\n"

// . "  FROM INFORMATION_SCHEMA.COLUMNS\n"

// . "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";

// $result0011 = $mysqli->query($sql0011);

// if ($result0011->num_rows > 0) {
// while($row0011 = $result0011->fetch_assoc()) {



//     $column[] = $row0011['COLUMN_NAME'];
 

    
// }};

// array_shift($column);
// var_dump($column);


//array_shift($column);

// $sub_array = array();

// $sql001 = "SELECT COLUMN_NAME\n"

// . "  FROM INFORMATION_SCHEMA.COLUMNS\n"

// . "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";

// $result001 = $mysqli->query($sql001);

// if ($result001->num_rows > 0) {
// while($row001 = $result001->fetch_array()) {



// $sub_array[] = $row001['COLUMN_NAME'];

// echo $row001['COLUMN_NAME']."\n <br>";



// }};

// var_dump( $sub_array);

// 

function recursion($integer){

 $newint = $integer-($integer-1); 

 return $newint;

};


$sql0011 = "SELECT COLUMN_NAME\n"

. "  FROM INFORMATION_SCHEMA.COLUMNS\n"

. "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";

$result0011 = $mysqli->query($sql0011);

if ($result0011->num_rows > 0) {
while($row0011 = $result0011->fetch_array()) {


//  $number = (count($row0011['COLUMN_NAME'])) - 1;

$number=(mysqli_num_rows($result0011)) - 1;

    
}};



  foreach (range(1, $number) as $range1) {
    $range[]= $range1;
    //echo '['.$range1.', '.'], ';

  }


?>


<script type="text/javascript" language="javascript" >



$(document).ready(function(){





 var dataTable = $('#users').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : { 
   url:"fetch.php",
   type:"POST"
  }
 });

 $('#users').on('draw.dt', function(){
  $('#users').Tabledit({
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[ //['1', 'prematchname'], ['2', 'prematchmatchnumber'], ['3', 'prematchteamnumber'], ['4', 'prematchrobot'], ['5', 'prematchnoshow'], ['6', 'autostartinglocation'], ['7', 'autoleftcommunity'], ['8', 'autolowcube'], ['9', 'automidcube'], ['10', 'autohighcube'], ['11', 'autolowcone'], ['12', 'automidcone'], ['13', 'autohighcone'], ['14', 'autochargestationdocked'], ['15', 'autochargestationengaged'], ['16', 'teleoplowcone'], ['17', 'endgamestartedbalancing'], ['18', 'endgameendedbalancing'], ['19', 'endgamenumberofalliancebotsbalanced'], ['20', 'postmatchdriverskill'], ['21', 'postmatchdied'], ['22', 'postmatchtippedover'], ['23', 'postmatchyellowcard'], ['24', 'postmatchredcard'], ['25', 'postmatchcomments'], ['26', 'teleopmidcone'], ['27', 'teleophighcone'], ['28', 'teleoplowcube'], ['29', 'teleopmidcube'], ['30', 'teleophighcube'], ['31', 'teleopchargestationparked'], ['32', 'teleoppickedupconefromfloor(upright)'], ['33', 'teleoppickedupconefromfloor(side)'], ['34', 'teleoppickedupcubefromfloor'], ['35', 'teleoppickedupconefromhp'], ['36', 'teleoppickedupcubefromhp'], ['37', 'teleopwasdefended'], ['38', 'teleopplayeddefense'], ['39', 'totalpoints'], ['40', 'teleopchargestationdocked'], ['40', 'teleopchargestationengaged'] ]
    ]
      
      
      
//       <?php 
      



  
// $sql1 = "SELECT name, time FROM form";
//     $result1 = $mysqli->query($sql1);
  
//     if ($result1->num_rows > 0) {

//       foreach (range(1, $number) as $range1) {
//         while($row1 = $result1->fetch_assoc()) {
//           $row01 = $row1['name'];
    
//       echo "['".$range1."', '" . $row1['time'].str_replace(' ', '', strtolower( $row1['name'] ))."'], ";


            
//     }




//   }};?>
// [1, 'field1'], [2, 'field2']
//]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#users').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script>  
<?php
session_start();
// error_reporting(0); 
include '../includes/connection.php';
require_once 'adminconfirm.php';

function createPassword($length)
{
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= ($length - 1)) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}




// $query = "SELECT * FROM sdata";

// if ($result = $mysqli->query($query)) {

//     /* fetch associative array */
//     while ($row = $result->fetch_assoc()) {
//         $field1name = $row["col1"];
//         $field2name = $row["col2"];
//         $field3name = $row["col3"];
//         $field4name = $row["col4"];
//         $field5name = $row["col5"];
//     }

//     /* free result set */
//     $result->free();
// }





?>

 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Admin</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/"> -->

    




    <link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../css/bootstrap.js"></script>


  <script src="../css/jquery.js"></script>

<!-- 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->




    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      input[type="text"]:disabled {
        background-color: #383838;

      }

      /* td:first-child {     display:none; } */

    </style>

    
    <!-- Custom styles for this template -->
    <link href="sidebar.css" rel="stylesheet">
  </head>
  <body>

  
<?php //require_once 'includes/navbar.php'; ?> 
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../account.php">Scouting Home</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="" aria-label="Search" disabled>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../login/logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="scan.php">
              <span data-feather="home"></span>
              QR Code Scanner
            </a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" aria-current="page" href="lookup.php">
              <span data-feather="home"></span>
              Team/Match Lookup
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="insert.php">
              <span data-feather="home"></span>
              Insert Scouting Data
            </a>
          </li>

        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">              Manually Insert Scouting Data/Scouting Data Verification
</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">




            <!-- <button type="button" onclick ="register()" class="btn btn-sm btn-outline-secondary">Register a user</button>
             <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <a href="csv.php"><button type="button" class="btn btn-sm btn-outline-secondary">Export scouting data to CSV</button></a> -->
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      <!-- <div id="register"> -->
<style> 
iframe{
  padding-left: 25%;
}
</style>
<!-- <iframe src="scouting-data/scouting-data.php" style="border:none;" title="Scouting Data" height="1000px" width="100%"></iframe>

      <iframe src="users/users.php" style="border:none;" title="Users" height="1000px" width="100%"></iframe>

      <script>
    function register() {
        document.getElementById("register").innerHTML = "<iframe src=\"register.php\" height=\"1000px\" width=\"100%\" ></iframe>";

    }
</script> -->

<?php 
if (isset($_POST['data'])){

    if(isset($_POST['postpass'])){


        if( ($_SESSION['formpas'] != $_POST['postpass']) ){
    
            $_SESSION['formpas'] = $_POST['postpass'];
    
            unset($_POST['postpass']);


            $separator = ";";

            $exploded = explode($separator, $_POST['data']); 
        
            // foreach ($exploded as $explodechange) {
            //   $explodechange = strstr($explodechange, 'www/=');;
            // }
        
            // foreach ($exploded as $explodechange) {
            //   $explodechange = str_replace("=", "", $explodechange);
            // }
        
$size11= sizeof($exploded);
$size12=($size11)-1;

            for ($i = 0; $i < ($size11); $i++) {
              $exploded[$i]=strstr($exploded[$i], "=");
          }

          for ($i = 0; $i < ($size11); $i++) {
            $exploded[$i]=str_replace("=", "", $exploded[$i]);
        }

        
        // for ($i = 0; $i < ($size11); $i++) {
        //   $exploded[$i]=preg_replace('/[^A-Za-z0-9 ]/', '', $exploded[$i]);
        // }

        $exploded[$size12]=preg_replace('/[^A-Za-z0-9 ]/', '', $exploded[$size12]);
        
        // var_dump($exploded);

    
    $sql = "SELECT COLUMN_NAME\n"

    . "  FROM INFORMATION_SCHEMA.COLUMNS\n"

    . "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";


    $result1 = $mysqli->query($sql); 
                    if ($result1->num_rows > 0) {
                      while($row1 = $result1->fetch_array()) {
                
                        
                        $key[] = $row1['COLUMN_NAME'];


                    }

                };

                unset($key['0']);


                $num= (sizeof($key));


                // unset($exploded[$num]);
                // unset($exploded[($num-1)]);

                // unset($exploded['0']);

                
                $k = array();
                $v = array();
                
                $k = "`".implode("`, `", array_values($key)) . "`";
                $v = "'" . implode("', '", array_values($exploded)) . "'";
                
// echo($k);
// echo '<br>';
// echo($v);

              //  echo $k . "\n <br>";
              //  echo $v;
                $sql001 = "INSERT INTO sdata ( $k )
                VALUES ( $v )";
                
                    $mysqli->query($sql001);
                         

                    $sql002 = "INSERT INTO sdata_backup ( $k )
                    VALUES ( $v )";
                    
                        $mysqli->query($sql002);
                                              
                   
                        ?>
                            <div class="alert alert-success" role="alert">
                        The data has been saved successfully.
                        </div>
                        
                        <?php
                        
                        
    
            }}};



?>



<form style="padding-top:80px" action="insert.php" method="post">
<input type='hidden' name='postpass' value='<?php echo createPassword(149)?>'>
  <div class="mb-3">
    <label for="data" class="form-label">Scouting Data</label>
    <input type="data" class="form-control" id="data" name="data" required>
  </div>


  <button style="margin-top:20px;" type="submit" class="btn btn-primary">Submit</button>
</form>

<br>
<br>

<table class="table table-bordered table-striped">
<tr>  
<th>Match Number</th>
  <th>Validation</th>
</tr>



<?php

$unique=array();

  $sql = "SELECT `match` FROM `sdata` ORDER BY `match` DESC";

    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {



      // $unique1=array_unique($row);
    

      // $unique=array_merge($unique, $row);

      // print_r($unique);

      // var_dump($row);

      $unique[]=$row;

      // $cost_array['cno'] = $cno;
      // $cost_array['cno'][] = $cno;



?>
<!-- 
    <?php //echo $row['name']; ?></tr> -->



<?php
  }};

// print_r((array_unique($unique)));

$i=0;


// $unique1=(array_unique($unique,SORT_REGULAR));
$unique1=$unique;

// echo "test".$unique1[$i]['match'];

// var_dump($unique1);

// do {


  // foreach ($unique1 as $rowu) {

// echo ((count($unique1['match'])));

// $newArray = array_merge(...$array);

// $vunique=(array_values(array_merge(...$unique1)));


// echo count(array_unique($unique1,SORT_REGULAR));


// $sql23 = "SELECT `team` FROM `sdata` WHERE `match` = '1'";

// $result6 = $mysqli->query($sql23);

// $result7= $result6->fetch_all(MYSQLI_ASSOC);

// print_r ($result7);



// echo count(array_unique($result7,SORT_REGULAR));


// $sql23 = "SELECT `team` FROM `sdata` WHERE `match` = '33'";

// $result6 = $mysqli->query($sql23);

// $result7= $result6->fetch_all(MYSQLI_ASSOC);



// if (count($result7) != count(array_unique($result7,SORT_REGULAR))){

//   $duplicate= count($result7) - count(array_unique($result7,SORT_REGULAR));

// }
// else {

//   $duplicate=0;

// };
// echo count($unique1);
$j=0;
$rowuj=array();
// print_r($unique1);
while ($j<count($unique1)) {
  array_push($rowuj,$unique1[$j]['match']);
//var_dump($unique1[$j]);
// echo $j;
  $j++;
// echo '<script>console.log('.$j.'); </script>';
// echo 'test';
}


$rowuju=array();
$rowuju=array_unique($rowuj,SORT_REGULAR);
rsort($rowuju);


while($i<count(array_unique($rowuj,SORT_REGULAR))) {

  foreach ($rowuju as $ijk) {
    

 $rowu =  $ijk;

// echo $rowu;

  $sql22 = "SELECT `match` FROM `sdata` WHERE `match` = '$rowu'";

  $result = $mysqli->query($sql22);
  
  $nummatch = mysqli_num_rows($result);


  $sql23 = "SELECT `team` FROM `sdata` WHERE `match` = '$rowu'";

  $result6 = $mysqli->query($sql23);
  
  $result7= $result6->fetch_all(MYSQLI_ASSOC);



  if (count($result7) != count(array_unique($result7,SORT_REGULAR))){
    $duplicate= count($result7) - count(array_unique($result7,SORT_REGULAR));

  }
  else {
    $duplicate=0;

  };


  ?>

  <tr><td><?php echo $rowu?></td> <td><?php
  
  if ($nummatch == 6) {

   ?> 
   
   <div style="color:green">

   <?php 

  } elseif ($nummatch < 6) {
    ?> 
   
    <div style="color:red">
 
    <?php 
  }
 elseif ($nummatch > 6) {
  ?> 
   
  <div style="color:orange">

  <?php 
}

  echo $nummatch . ' submissions&nbsp&nbsp&nbsp</div>';
  
  if ($duplicate > 0) {
    ?> 
   
    <div style="color:red">
 
    <?php 
  }
  else {
    ?> 
   
    <div style="color:green">
 
    <?php
  }

  echo $duplicate. " team duplicates"?></td></tr> </div>

  <?php


$i=$i+1;

   }};


// $i=$i+1;

// }
// while($i<sizeof($unique1));

  // $sql22 = "SELECT `match` FROM `sdata` WHERE `match` = '$unique1'";

  // $result = $mysqli->query($sql22);
  
  // $nummatch = mysqli_num_rows($result);

  ?>

  <!-- <tr><td><?php //echo $rowu?></td> <td><?php //echo $nummatch?></td></tr> -->

  <?php


?>

</table>

<?php 

?>



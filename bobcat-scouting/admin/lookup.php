<?php
session_start();
include '../includes/connection.php';
require_once 'adminconfirm.php';



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

      td:first-child {     display:none; }

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
            <a class="nav-link active" aria-current="page" href="lookup.php">
              <span data-feather="home"></span>
              Team/Match Lookup
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="insert.php">
              <span data-feather="home"></span>
              Insert Scouting Data
            </a>
          </li>

        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">              Team/Match Lookup
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
if (isset($_POST['id'])){

// echo $_POST['id'];
// echo $_POST['number'];

?>

<table id="table" class="table table-bordered table-striped">
       <thead>
        <tr>

<th style="display:none;">ID</th>

<?php

    $sql = "SELECT name FROM form";
    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
    
?>

    <th><?php echo $row['name']; ?></th>

    

<?php
  }};

?>

<th>Total Match Points</th>

        </tr>
       </thead>
       <tbody>




<?php $query0 = "SELECT name, time FROM form";
                    $result0 = $mysqli->query($query0);
                    
                    if ($result0->num_rows > 0) {
                    while($row0 = $result0->fetch_assoc()) {

                        ?>

<?php //echo "<span id=\"" . $row0['time'].str_replace(' ', '', strtolower( $row0['name'] )) . "\"></span><br>";
                    }};
?> 

        <script>


    const cols = [ 
    
    
    <?php $query0 = "SELECT name, time FROM form";
                    $result0 = $mysqli->query($query0);
                    
                    if ($result0->num_rows > 0) {
                    while($row0 = $result0->fetch_assoc()) {

                        ?>

<?php echo "\"" . $row0['time'].str_replace(' ', '', strtolower( $row0['name'] )) . "\"," ;?> 

        <?php };}; echo"\"end\""; ?> ]

// console.log(cols);

const table = document.getElementById("table")

// for (var x = 1; x < 5; x++) {
//         for (var i = 1; i < table.rows.length; i++) {
//             sumVal = sumVal + parseInt(table.rows[i].cells[x].innerHTML);
// console.log(sumVal);
//         }}

for (const col of cols) {
  const cells = table.querySelectorAll('.' + col)
console.log(col);
console.log(cells);



  const values = []
  for (const cell of cells) {
    values.push(Number(cell.innerHTML))
  }
  const average = values.reduce((partialSum, a) => partialSum + a, 0) / values.length
  document.getElementById(col).innerHTML = `Average ${col}: ${average}`
}

function getColumn(table_id, col) {
    var tab = document.getElementById(table_id),
        n = tab.rows.length,
        arr = [],
        row;
    
    if (col < 0) {
        return arr; // Return empty Array.
    }
    for (row = 0; row < n; ++row) {
        if (tab.rows[row].cells.length > col) {
            arr.push(tab.rows[row].cells[col].innerText);
        }
    }
    return arr;
}

var test = getColumn('table', 3);
console.log(test);

</script>



<?php

if ($_POST['id']=='match'){
    $sql01 = "SELECT * FROM `sdata` WHERE prematchmatchnumber = '$_POST[number]'";
}

elseif ($_POST['id']=='team'){
    $sql01 = "SELECT * FROM `sdata` WHERE prematchteamnumber = '$_POST[number]'";
}

else{

    echo 'none';

}

$results = mysqli_query($mysqli,$sql01);
// echo "<table>"; //begin table tag...
//you can add thead tag here if you want your table to have column headers
 while($rowitem = mysqli_fetch_array($results)) {
    echo "<tr>";
    // echo "<td>" . $rowitem['name'] . "</td>";

    $sql001 = "SELECT COLUMN_NAME\n"
    . "  FROM INFORMATION_SCHEMA.COLUMNS\n"
    . "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";    
    $result001 = $mysqli->query($sql001);    
        if ($result001->num_rows > 0) {
        while($row001 = $result001->fetch_array()) {
    
            
            echo "<td>" . $rowitem[$row001['COLUMN_NAME']] . "</td>";

            if ($_POST['id']=='match'){
                $sql12345 = "SELECT AVG($row001[COLUMN_NAME]) AS average FROM sdata WHERE prematchmatchnumber = '$_POST[number]'";
            }
            elseif ($_POST['id']=='team'){
                $sql12345 = "SELECT AVG($row001[COLUMN_NAME]) AS average FROM sdata WHERE prematchteamnumber = '$_POST[number]'";
            }
        

            $result12345= mysqli_query($mysqli, $sql12345);
            $row12345 = mysqli_fetch_array($result12345); 
            // echo "<td>" .$row001['COLUMN_NAME']. " " .$row12345['average'] . "</td>" ;
    
    
    }};

    // echo "<td>" . $rowitem['date'] . "</td>";
    // echo "<td>" . $rowitem['present'] . "</td>";
    // echo "<td>" . $rowitem['website'] . "</td>";
    echo "</tr>";

      
}
echo "</tbody></table"; //end table tag
}



if (isset($_POST['id'])){

echo "<table id=\"averages\" class=\"table table-bordered table-striped\"><tr>";

$sql001 = "SELECT COLUMN_NAME\n"
. "  FROM INFORMATION_SCHEMA.COLUMNS\n"
. "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";    
$result001 = $mysqli->query($sql001);    
    if ($result001->num_rows > 0) {
    while($row001 = $result001->fetch_array()) {


      if ($_POST['id']=='match'){
        $sql12345 = "SELECT AVG($row001[COLUMN_NAME]) AS average FROM sdata WHERE prematchmatchnumber = '$_POST[number]'";
    }
    elseif ($_POST['id']=='team'){
        $sql12345 = "SELECT AVG($row001[COLUMN_NAME]) AS average FROM sdata WHERE prematchteamnumber = '$_POST[number]'";
    }
 

$result12345= mysqli_query($mysqli, $sql12345);
$row12345 = mysqli_fetch_array($result12345); 
echo "<td>" .$row12345['average'] . "</td>" ;

    }};

    echo "</tr></table>";

  }
?>

<form style="padding-top:80px" action="lookup.php" method="post">
  <div class="mb-3">
    <label for="number" class="form-label">Team/Match Number</label>
    <input type="number" class="form-control" id="number" name="number" required>
  </div>
    <select required class="form-select" id="id" name="id">
  <option value="team">Team</option>
  <option value="match">Match</option>
    </select>

  <button style="margin-top:20px;" type="submit" class="btn btn-primary">Submit</button>
</form>

<?php 

?>



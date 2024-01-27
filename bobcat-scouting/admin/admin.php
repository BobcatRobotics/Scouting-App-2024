<?php
session_start();
include '../includes/connection.php';
require_once 'adminconfirm.php';
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
            <a class="nav-link active" aria-current="page" href="admin.php">
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
          <!-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="lookup.php">
              <span data-feather="home"></span>
              Team/Match Lookup
            </a>
          </li> -->
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
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" onclick ="register()" class="btn btn-sm btn-outline-secondary">Register a user</button>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <div class="btn-group me-2">
          <a href="csv.php"><button type="button" class="btn btn-sm btn-outline-secondary">Export scouting data to CSV</button></a></div>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
            <div class="btn-group me-2">
            <div class="btn-group me-2">
          <a href="csvall.php"><button type="button" class="btn btn-sm btn-outline-secondary">Export <strong>ALL</strong> scouting data to CSV (unedited)</button></a></div>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
            <div class="btn-group me-2">

<button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deletemodal"> Delete Table</button>
    </div>            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>

          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>

      <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete all the data in the scouting data table?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="delete.php"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      <div id="register">
<style> 
iframe{
  padding-left: 25%;
}
</style>
<iframe src="scouting-data/scouting-data.php" style="border:none;" title="Scouting Data" height="1000px" width="100%"></iframe>

      <iframe src="users/users.php" style="border:none;" title="Users" height="1000px" width="100%"></iframe>

      <script>
    function register() {
        document.getElementById("register").innerHTML = "<iframe src=\"register.php\" height=\"1000px\" width=\"100%\" ></iframe>";

    }
</script>
<?php 

?>



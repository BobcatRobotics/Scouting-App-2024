<!DOCTYPE html>
<head>
<title>Bobcat Robotics</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Bobcat Robotics</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">

<?php
require_once 'functions.php';
showMenu();
//session_start();

?>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php
 
 
 // change navbar items based on login status
 //initialize variable
 $loginaction = '';

 //check if username is set in the session variable and switch the loginaction variable based on the information
 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
     $loginaction = 'logged_out';
 } else {
     $loginaction = 'logged_in';
 }

 //switch based on variable status
 switch ($loginaction) {
     case 'logged_in':
 ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <div class="account">
            <li><a class="dropdown-item" href="../account.php">Account</a></li>
            <li><a class="dropdown-item" href="../password_reset.php">Reset Password</a></li>

          <?php 
          
          if ($_SESSION['admin']==1){
            echo '<li><a class="dropdown-item" href="../admin/admin.php">Admin</a></li>';
          }


          if ($_SESSION['scouter']==1 || $_SESSION['admin']==1){
            echo '<li><a class="dropdown-item" href="../scouting/index.php">Scouting</a></li>';
          }

          ?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
          </div>
          </ul>
          

 <?php
     break;
     case 'logged_out':
 ?>


        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../login.php">Login</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="register.php">Register</a>
        </li> -->

 <?php
     break;
 }
?>

</ul>

</div></div>
</nav></nav>


</ul></div></div></nav></nav>



</body>
</html>
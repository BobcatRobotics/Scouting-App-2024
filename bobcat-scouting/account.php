<?php
session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once 'includes/navbar.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile</title>
	
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="css/bootstrap.js"></script>
<style>
	.table {
		padding-left: 100px;
		padding-right: 100px;
		margin-top: 100px;
	}
</style>
	
</head>
	<body>
<div class="table">
<table class="table">
  <thead>
    <tr>
	<th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>	<?php echo $_SESSION['username'];  ?>  </td>
      <td>			<?php echo $_SESSION['first_name']; ?> </td>
      <td>						<?php echo $_SESSION['last_name']; ?></td>
	  <td>						<?php echo $_SESSION['email']; ?>	</td>
    </tr>
  </tbody>
</table>
</div>
	</body>
</html> 
<?php
session_start();
session_regenerate_id();
if(isset($_SESSION['id'])){
    header('location: account.php');
}
require_once 'includes/connection.php';
mysqli_set_charset($mysqli, "utf8"); 
// Define variables and initialize with empty values
$username = $password = "";
$param_password = password_hash("password", PASSWORD_DEFAULT);

$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter your username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            $_SESSION['loggedin'] = true;
                            $sql1 = "SELECT id, email, admin, first_name, last_name, scouter FROM users WHERE `username` = '$username'";
                            $result1 = $mysqli->query($sql1);
                            $stmt1 = $result1->fetch_assoc();
                            $_SESSION['email'] = $stmt1['email'];
                            $_SESSION['first_name'] = $stmt1['first_name'];
                            $_SESSION['last_name'] = $stmt1['last_name'];
                            $_SESSION['admin'] = $stmt1['admin'];
                            $_SESSION['id'] = $stmt1['id'];
                            $_SESSION['scouter'] = $stmt1['scouter'];
                            header("location: account.php");


                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($mysqli);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/form.css">
    
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="css/bootstrap.js"></script>

    <style type="text/css">
        .c body{ font: 14px sans-serif; }
        .c .wrapper{ width: 350px; padding: 20px; }
        .c .form-group {
            padding: 10px;
        }
        .c h1 {font-size: 30px}
        .c h4 { text-align: center; font-weight:normal; font-size:large; padding-top: 10px;}
        .c .h5 { text-align: center; font-weight: normal; font-size: medium;}
        .c .submit-btn{align-self: center; text-align: center;}
        .c sup {color: red;}

    </style>

</head>
<?php require_once 'includes/navbar.php';?>
<div class="c">
<body>
<main>
    <div class="wrapper">
        
    <header>
        <h1>Login</h1>
    </header>
        <h4>Please fill in your credentials to login.</h4>    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class= "form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <small class="text-danger"><?php echo $username_err; ?></small>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <small class="text-danger"><?php echo $password_err; ?></small>
            </div>
            <div class="submit-btn">
            <div class="form-group">
                <div class="send_message">
                <button type="submit">Submit</button>
            </div>
            </div>
        </div>
            


</form>

    </div>  
</main>  
</body>
</div>
</html>
<?php //} ?>
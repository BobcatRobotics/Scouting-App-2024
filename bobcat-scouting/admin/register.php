<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);
require_once 'adminconfirm.php';
//require 'includes/functions.php';
// Include config file
require '../includes/connection.php';

if($_SESSION['registersuccess']=='true') {
?>
    <div class="alert alert-success" role="alert">
The user has been successfully registered.
</div>

<?php
}

// require_once 'adminconfirm.php';
// Define variables and initialize with empty values
$username = $first_name = $last_name = $email = $password = $confirm_password = $email = "";
$username_err = $first_name_err = $last_name_err = $email_err = $password_err = $confirm_password_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 8){
        $password_err = "Password must have at least 8 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password along with some logic to prevent conflicting error messages
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password AND strlen(trim($password_err)) == 0){
            $confirm_password_err = 'Password did not match.';
        } else if ($password != $confirm_password AND strlen(trim($password_err)) > 0){
            $confirm_password_err = $password_err;
        }
    }

//validate first name
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter a first name.";
    } else{

                    $first_name = trim($_POST["first_name"]);
                }

//validate last name
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter a last name.";
    } else{

                    $last_name = trim($_POST["last_name"]);
                }

// validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!$email) {
        $email_err = 'Please enter a valid email';
    }
} else {
    $email_err = 'Please enter an email';
}



    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err)&& empty($email_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, first_name, last_name, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $email, $first_name, $last_name, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: register.php");
                $_SESSION['registersuccess']=true;
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/form.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../css/bootstrap.js"></script>
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
<?php //require 'includes/navbar.php';?>
<div class="c">
<body>
<main>
    <div class="wrapper">

        <header><h1>Sign Up</h1></header>
        <h4>Please fill this form to create an account.</h4>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <small class="text-danger"><?php echo $username_err; ?></small>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <small class="text-danger"><?php echo $password_err; ?></small>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <small class="text-danger"><?php echo $confirm_password_err; ?></small>
            </div>
            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                <label>First Name:<sup>*</sup></label>
                <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                <small class="text-danger"><?php echo $first_name_err; ?></small>
            </div>
            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                <label>Last Name:<sup>*</sup></label>
                <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                <small class="text-danger"><?php echo $last_name_err; ?></small>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email:<sup>*</sup></label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <small class="text-danger"><?php echo $email_err; ?></small>
            </div>


            <div class="submit-btn">
            <div class="form-group">
                <div class="send_message">
                <button type="submit">Submit</button>
            </div>
            </div>
    <!-- <div class="form-group">
                <input type="reset" class="btn btn-default" value="Reset">
            </div> -->
                <!-- <h4><div class="h5">Already have an account? <a href="login.php">Login here</a>.</h5></h4> -->
        </form>
    </div>
</main>    
</body>
</div>
</html>
<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
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
        
        if($stmt = mysqli_prepare($link, $sql)){
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
                            header("location: tableview.php");
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
    mysqli_close($link);
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8"
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color:#563d7c"


<body>
    <br />
  <h2 align="center"><a href="#">Logowanie</a></h2>
  <br />
    <div class="container">
        <form method="POST" action='#'>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"> 
            <div class="jumbotron" style="margin-top:150px">

            <h3>Please Login</h3>
            <br>
                <form>
                <div class="form-group">
                <input type="text" class="form-control" name="username"
                placeholder="Enter Username">
                </div>

                <div class="form-group">
                <input type="password" class="form-control" name="password"
                placeholder="Password">
                </div>

               

                <button type="submit" class="btn btn-primary form-control">Login</button>
                <p><a href="index.php" class="btn btn-danger form-control">Exit</a></p>
                </form>
            </div>
        
        
        
        
        </div>
        <div class="col-lg-4"></div>
    
    
    </div>
</body>
</html>
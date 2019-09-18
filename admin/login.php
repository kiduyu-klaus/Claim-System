<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db("claimsystem", $conn);
	error_reporting(0);
	session_start(); // Starting Session



	$error=''; // Variable To Store Error Message
	if (isset($_POST['login'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is empty";
		}
		else {
			$email = $_POST['username'];
			$passwd = $_POST['password'];

			$email = stripslashes($email);
			$passwd = stripslashes($passwd);
			$email = mysql_real_escape_string($email);
			$passwd = mysql_real_escape_string($passwd);

			// SQL query to fetch information of registerd users and finds user match.
			$result = mysql_query("SELECT * FROM admin WHERE username = '$email' AND  password = '$passwd'") or die (mysql_error());
				if (!$result) 
				{
					die("Query to show fields from table failed");
				}
						
				$numberOfRows = MYSQL_NUMROWS($result);				
				if ($numberOfRows == 0)
				{
					$error = " <font color= 'red'>Invalid username and password!</font>";
				} 
				 else if ($numberOfRows > 0)
				{
          session_start();
         $row = mysqli_fetch_assoc($numberOfRows);
         $_SESSION['admin']=$row['id'];
          header("location: index.php");

					exit();
				}
				else {
					$error = "Username or Password is invalid";
				}
			} 
			mysql_close($connection); // Closing Connection
		}
 // Redirecting To Other Page
	
	

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../dashboard/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="">
          <?php echo"$error"?> <br\>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text"  name="username" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="LOGIN" name="login">
          
        </form> <br> <center>
          <a href="../" type="button" class="btn btn-info">Back to home page</a>
        </center>
        

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

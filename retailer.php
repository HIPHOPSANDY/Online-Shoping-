<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if (isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$passwords = hash('sha256', $pass); // password hashing using SHA256
		
			$res= mysqli_query($con, "SELECT userId, userName, userPass FROM users WHERE userEmail ='$email'");
			$row= mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$passwords ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>
<!Doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="images/icon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" charset="utf-8" href="css/bootstrap.css" media="screen" title="no title">
<title>NambaKada</title>
</head>
<!-- header -->
<div class="header">
		<div class="container">
			<div class="logo">
				<a href="#"><img src="images/logo.png" alt=""></a>
			</div>
		<div class="header-right">
			<a class="account" href="register.php">
			    <span class="glyphicon glyphicon-new-window"></span>&nbsp;Sign Up</a>
		</div>
		</div>
</div>
<!-- Register form -->
<section id="home" style="background:url(images/bg.png);background-size:100% 100%;text-shadow: 1px -1px 20px #5f5f5f;box-shadow: inset 1px 0px 9px 4px #5a5a59;box-shadow: inset -8px 1px 0px 0px #646464;box-shadow: inset -17px 2px 20px 0px #5e5e5e;" class="cl_white text-center"><div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6"></br>

   <form class="col=md-8 col-md-offset-2" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
     <div class="form-group">
		<label for="head"><h3><b> User Login</b></h3></label>
	</div>
	 <div class="form-group">
            	<hr />
            </div>
            <div class="form-group">
            	
   
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
              
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
             
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
        
      </form></br></br></br></br>
</div>
</div>    
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
</div>

<!--footer section start-->		
		<footer>
			<div class="footer-bottom text-center">
			<div class="container">
				<div class="footer-logo">
					<a href="#"><span>Namba</span>Kada</a>
				</div>
				<div class="copyrights">
					<p> © 2017 NambaKada.| Design by  jamu</p>
				</div>
				</br>	</br>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
		</section>
</body>
</html>

<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {

		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);

		$companyName = trim($_POST['company_name']);
		$companyName = strip_tags($companyName);
		$companyName = htmlspecialchars($companyName);

		$productName = trim($_POST['selling_product']);
		$productName = strip_tags($productName);
		$productName = htmlspecialchars($productName);

		$phone = trim($_POST['phoneno']);
		$phone = strip_tags($phone);
		$phone = htmlspecialchars($phone);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		$confirm_password = trim($_POST['confirm_password']);
		$confirm_password = strip_tags($confirm_password);
		$confirm_password = htmlspecialchars($confirm_password);

		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}

		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysqli_query($con,$query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}else if($confirm_password != $pass) {
			$error = true;
			$cpassError = "Password can't match with confirm password.";
		}

		// password encrypt using SHA256();
		$password = hash('sha256', $pass);

		// if there's no error, continue to signup
		if( !$error ) {

			$query = "INSERT INTO users(userName,companyName,productName,phone,userEmail,userPass) VALUES('$name','$companyName','$productName','$phone','$email','$password')";
			$res = mysqli_query($con,$query);

			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($name);
				unset($companyNameame);
				unset($productName);
				unset($phone);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";
			}

		}


	}
?>
<!Doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<link rel="shortcut icon" href="images/icon.png" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
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
			<a class="account" href="retailer.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;
			    Sign In</a>
		</div>
		</div>
</div>
<!-- Register form -->
<section id="home" style="background:url(images/bg.png);background-size:100% 100%;text-shadow: 1px -1px 20px #5f5f5f;box-shadow: inset 1px 0px 9px 4px #5a5a59;box-shadow: inset -8px 1px 0px 0px #646464;box-shadow: inset -17px 2px 20px 0px #5e5e5e;" class="cl_white text-center"><div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">

   <form class="col=md-8 col-md-offset-2" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
     <div class="form-group">
		<label for="head"><h3><b> User Registrations</b></h3></label>
	</div>
	 <div class="form-group">
            	<hr />
            </div>
            <div class="form-group">

            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" required="required" />

                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>

			<div class="form-group">
				<input type="text" name="company_name" value="<?php echo $companyNameame ?>" id="company_name" class="form-control" required="required" placeholder="Company Name">
	       </div>

			<div class="form-group">
				<input type="listbox" name="selling_product" value="<?php echo $productName ?>" id="selling_product" class="form-control" required="required" placeholder="Selling Products">
			</div>

			<div class="form-group">
				<input type="text" name="phoneno" id="phoneno" value="<?php echo $phone ?>" class="form-control" required="required" placeholder="Phone number">
				<span class="text-danger"><?php echo $phonenoError; ?></span>
			</div>


            <div class="form-group">

            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />

                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group">

            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />

                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

			<div class="form-group">
				<input type="password" name="confirm_password" id="confirm_password" class="form-control" required="required" placeholder="Conform Password">
				<span class="text-danger"><?php echo $cpassError; ?></span>
			</div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>

            <div class="form-group">
            	<hr />
            </div>


        </form>
</div>
</div>
<?php
			if ( isset($errMSG) ) {

				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
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
<?php ob_end_flush(); ?>
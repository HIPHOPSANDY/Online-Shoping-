<?php
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		
	}
	$res=mysqli_query($con, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
    $id=$userRow[userId];
	$name=$userRow[companyName];
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>NambaKada</title>
<link rel="shortcut icon" href="images/icon.png" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link href="assets/datatables.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" charset="utf-8" href="css/bootstrap.css" media="screen" title="no title">

<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn-view").click(function(){
		
		$("body").fadeOut('slow', function()
		{
			$("body").load('retailer.php');
			$("body").fadeIn('slow');
			window.location.href="retailer.php";
		});
	});
	
});
</script>

</head>

<body>  
<div class="header">
		<div class="container">
			<div class="logo">
				<a href="#"><img src="images/logo.png" alt=""></a>
			</div>
		<div class="header-right">
			 <a  class="account" href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
		</div>
		</div>
</div>
    


	<div class="container">
      
        <div class="row">
        
		<label for="head">
		   <h4 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload your new Products here &nbsp; </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" <?php echo $name;?> "</h4>
		    </label>
    </div>
        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Customer</button>
		<hr />
        
	 <form method='post'  action='inspro.php' enctype='multipart/form-data'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='adid' value='<?php echo $id; ?>' />
 		<input type='hidden' name='cname' value='<?php echo $name; ?>' />
 		
		<tr>
            <td>Product Name:</td>
            <td><input type='text' name='pname' class='form-control' value='' ></td>
        </tr>
        <tr>
            <td>Weight:</td>
            <td><input type='text' name='weg' class='form-control' value='' ></td>
        </tr>
         <tr>
            <td>Price:</td>
            <td><input type='text' name='price' class='form-control' value='' ></td>
        </tr>
        <tr>
            <td>Image:</td>
            <td><input type="file" class='form-control' name="imge"></td>
        </tr>
		 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="ins" id="semail"><span class="glyphicon glyphicon-share"></span>
                &nbsp; Insert
			</button>
            </td>
        </tr>
 
    </table>
</form>
        </div>

    </div>
	<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>
<script type="text/javascript" src="crud.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
<!--footer section start-->		
		<footer>
			<div class="footer-bottom text-center">
			<div class="container">
				<div class="footer-logo">
					<a href="#"><span>Namba</span>Kada</a>
				</div>
				<div class="copyrights">
					<p> © 2017 NambaKada.| Design by jamu</p>
				</div>
				</br>	</br>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>
</html>
<?php ob_end_flush(); ?>
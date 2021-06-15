<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">


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
</head>

<body>
<div class="header">
		<div class="container">
			<div class="logo">
				<a href="#"><img src="images/logo.png" alt=""></a>
			</div>
		<div class="header-right">
			 <a  class="account" href="logout.php?logout">
			     <span class="glyphicon glyphicon-log-out">&nbsp;SignOut</a>
		</div>
		</div>
</div>
<div class="container">
<div class="row">
<label for="head">
<h4 align="center">&nbsp; &nbsp;List of Companys & their Products</h4>
</label>
</div>
        <hr/>
        <div class="content-loader">
            <form method='post'  action='ordersend.php'>
        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th>Company-Name</th>
        <th>Category</th>
		<th>Make-Order</th>
        </tr>
        </thead>
        <tbody>
        <?php
      	$db_host = "localhost";
	$db_name = "sbdb";
	$db_user = "root";
	$db_pass = "";
	$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
         $stmt = mysqli_query($con,"SELECT * FROM users");
		while(($row=mysqli_fetch_array($stmt))!=null)
		{
			?>
			<tr>
			<td style="text-transform:capitalize;">
			    <?php echo $row['companyName']; ?></td>
			<td><?php echo $row['productName']; ?></td>
			<td align="center">
		<a class="order-link" name="uid"  href="productlist.php?uid=<?php echo $row['userId']; ?>" title="Order">
			<img src="images/order.png" width="40px" />
            </a></td>
			</tr>
			<?php
		}
		?>
        </tbody>
        </table>
         </form>
         <hr/>
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
					<p>© 2017 NambaKada.| Design by jamu</p>
				</div>
				</br>	</br>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
	
</body>
</html>
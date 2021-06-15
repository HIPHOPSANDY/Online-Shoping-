<?php
	require_once 'dbconnect.php';
     $db_host = "localhost";
	$db_name = "sbdb";
	$db_user = "root";
	$db_pass = "";
	$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	
		if(isset($_GET['uid']))
 {
  
     $con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    $uid=$_GET['uid'];
	$ress=mysqli_query($con, "SELECT * FROM users WHERE userId='".$uid."'");
    $userRow=mysqli_fetch_array($ress);
	$name=$userRow['companyName'];
	$remail=$userRow['userEmail'];
	$res=mysqli_query($con, "SELECT * FROM product WHERE userId='".$_GET['uid']."'");
 }
?>
 <!DOCTYPE html>
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
	
	$("#btn-view").hide();
	
	$("#btn-add").click(function(){
		$(".content-loader").fadeOut('slow', function()
		{
			$(".content-loader").fadeIn('slow');
			$(".content-loader").load('add_form.php');
			$("#btn-add").hide();
			$("#btn-offer").hide();
			$("#btn-view").show();
		});
	});
	
	$("#btn-view").click(function(){
		
		$("body").fadeOut('slow', function()
		{
			$("body").load('retailer.php');
			$("body").fadeIn('slow');
			window.location.href="retailer.php";
		});
	});
	
	$(".chk").on('change',function(){
		alert($(this).attr('qid'));
		//alert('hai');
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
        
		<label for="head"><h4 align="center">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose  your products from</br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; " <?php echo $name; ?> "</h4></label>
    </div>
		<hr/>
<form method='post'  action='ordersend.php'>
    
    <input type="hidden" name="id" value="<?php $row['produtId']; ?>" id="pid">
    <input type="hidden" name="sname" value="<?php echo $name; ?>" id="pid">
    <input type="hidden" name="semail" value="<?php echo $remail; ?>" id="pid">
      
    <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th><span class="glyphicon glyphicon-ok"></th>
        <th>Product</th>
		<th>Weight</th>
        <th>Price</th>
        </tr>
        </thead>
    <?php while(($row=mysqli_fetch_assoc($res))!=null){ ?>
    <tr>
	<td style="text-transform:capitalize;">
	<input type="checkbox" name="ch[]" class="form-check-input" qid="<?php echo $row['producId']; ?>" value="<?php echo $row['productName'].", ".$row['wight'].", "; ?>">
	</td>
	<td align="center">
	    <img class="img-responsive" src=<?php echo $row['image']; ?> alt="" width="60px">
    <br>
     <?php echo $row['productName']; ?>
    </td>
    <td> <?php echo $row['wight']; ?></td>
    <td>Rs-<?php echo $row['price']; ?></td
     </tr>
    <?php } ?>
  </table>
  	<hr/>
    <button type="submit" class="btn btn-block btn-primary" name="order"><span class="glyphicon glyphicon-shopping-cart">&nbsp;PlaceOrder</button>
    <hr/>
</form>
  </div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>
<script type="text/javascript" src="crud.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    //alert($('#qty').val());
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
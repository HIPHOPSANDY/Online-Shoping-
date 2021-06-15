<?php
 	require_once 'dbconnect.php';
 if(isset($_POST['order']))
 {
    foreach($_POST['ch'] as $selected)
        $values.=$selected."quantity=1\n";
        $sname=$_POST['sname'];
        $remail=$_POST['semail'];
 }
 
 
 
?>
 <! DOCTYPE html>
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
        
		<label for="head"><h4 align="center">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Give your Order Details to</br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;" <?php echo $sname; ?> "</h4></label>
    </div>
		<hr/>
<form method='post'  action='customer_order.php'>
 
    <table class='table table-bordered'>
        
		<tr>
         <td>Shop Mail:</td>
	   <td> <input type='text' name='to' class='form-control' value='<?php echo $remail; ?>' readonly="readonly" ></td>
       </tr>
		<tr>
            <td>User Mail:</td>
            <td><input type='text' name='from' class='form-control' value=''<?php echo $id; ?>'' require ></td>
        </tr>
        <tr>
            <td>Place To Delivery:</td>
            <td><input type='text' name='dplace' class='form-control' value='' require></td>
        </tr>
		 <tr>
            <td>Your Order Details:</td>
            <td>
			<textarea  rows="2" cols="20" name='orders' class='form-control'  style="text-transform:capitalize;"><?php echo $values; ?></textarea> </td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="semail" id="semail"><span class="glyphicon glyphicon-send">&nbsp;Order
			</button>
            </td>
        </tr>
 
    </table>
</form>
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
<?php ob_end_flush(); ?>
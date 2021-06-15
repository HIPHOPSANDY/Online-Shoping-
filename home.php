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
			 <a  class="account" href="logout.php?logout">
			     <span class="glyphicon glyphicon-log-out">&nbsp;SignOut</a>
		</div>
		</div>
</div>
    


	<div class="container">
      
        <div class="row">
        
		<label for="head">
		    <h4 align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Customers Detail of company </br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " <?php echo $name;?> "</h4>
		    </label>
            
			
        
    </div>
        <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Add Customer</button>
        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Customer</button>
    
            <a href="sendbulkmail.php" <button class="btn btn-info" type="button" id="btn-offer" > <span class="glyphicon glyphicon-cloud-upload"></span> &nbsp; Upload Offers</button></a>
            <a href="insertpro.php" <button class="btn btn-info" type="button" id="btn-pro" > <span class="glyphicon glyphicon-cloud-upload"></span> &nbsp; Upload Products</button></a>
        <hr />
        
        <div class="content-loader">
        
        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th>Customer Name</th>
        <th>Amount</th>
		<th>Send Bill</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'dbconfig.php';
        $stmt = $db_con->prepare("SELECT * FROM customers RIGHT JOIN users ON customers.admail=users.userEmail WHERE users.userId='$id' ORDER BY c_id DESC");
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td style="text-transform:capitalize;"><?php echo $row['c_name']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td align="center">
			<a id="<?php echo $row['c_id']; ?>" class="mail-link"  href="#" title="Billing">
			<img src="images/receipts.png" width="25px" />
            </a></td>
			<td align="center">
			<a id="<?php echo $row['c_id']; ?>" class="edit-link" href="#" title="Edit">
			<img src="images/ed.png" width="30px" />
            </a></td>
			<td align="center">
			<a id="<?php echo $row['c_id']; ?>" class="delete-link" href="#" title="Delete">
			<img src="images/del.png" width="30px" />
            </a></td>
			</tr>
			<?php
		}
		?>
        </tbody>
        </table>
        
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
<?php ob_end_flush(); ?>
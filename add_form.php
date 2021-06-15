<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
	}

		$res=mysqli_query($con, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
		$userRow=mysqli_fetch_array($res);
?>
<style type="text/css">
#dis{
	display:none;
}
</style>
    <div id="dis">
    <!-- here message will be displayed -->
	</div>
        
 	
	 <form method='post' id='emp-SaveForm' action="#">
 
    <table class='table table-bordered'>
	
        <input type='hidden' name='adid'  value='<?php echo $userRow['userId']; ?>' />
        <input type='hidden' name='admail' value='<?php echo $userRow['userEmail']; ?>'/></td>
        </tr>
 
        <tr>
            <td>Customer Name</td>
            <td><input type='text' name='c_name' class='form-control' placeholder='Enter the customer name' required /></td>
        </tr>
		
		<tr>
            <td>Customer Email</td>
            <td><input type='text' name='c_email' class='form-control' placeholder='Enter the customer Email Id' required /></td>
        </tr>
 
        <tr>
            <td>Mobile Number</td>
            <td><input type='text' name='mobile' class='form-control' placeholder='Enter their mobile no' required></td>
        </tr>
 
        <tr>
            <td>Balance Amount</td>
            <td><input type='text' name='amount' class='form-control' placeholder='Enter their balance amount' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Save this Record
			</button>  
            </td>
        </tr>
 
    </table>
</form>
     
<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
	}
	// select loggedin users detail
	$res=mysqli_query($con, "SELECT * FROM users WHERE userId="
	.$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
	$id=$userRow[userId];
?>
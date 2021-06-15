<?php
include_once 'dbconfig.php';

if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$stmt=$db_con->prepare("SELECT * FROM customers WHERE c_id=:id");
	$stmt->execute(array(':id'=>$id));	
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
}

?>
<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateForm' action='#'>
    <table class='table table-bordered'>
 		<input type='hidden' name='c_id' value='<?php echo $row['c_id']; ?>' />
        <tr>
            <td>Customer Name</td>
            <td><input type='text' name='c_name' class='form-control' value=
            '<?php echo $row['c_name']; ?>'</td>
        </tr>
		
		<tr>
            <td>customer Email:</td>
            <td><input type='text' name='c_email' class='form-control' value='<?php echo $row['c_email']; ?>' required ></td>
        </tr>
 
        <tr>
            <td>Mobile Number</td>
            <td><input type='text' name='mobile' class='form-control' value='<?php echo $row['mobile']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Balance Amount</td>
            <td><input type='text' name='amount' class='form-control' value='<?php echo $row['amount']; ?>' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
    		<span class="glyphicon glyphicon-floppy-saved"></span> &nbsp; Updates
			</button>
            </td>
        </tr>
 
    </table>
</form>
     

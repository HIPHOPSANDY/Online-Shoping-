<?php
include_once 'dbconfig.php';

if($_GET['mail_id'])
{
	$id = $_GET['mail_id'];	
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
        
 	
	 <form method='post'  action='sendbill.php'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='c_id' value='<?php echo $row['c_id']; ?>' />
		<tr>
            <td>From:</td>
            <td><input type='text' name='from' class='form-control' value='NambaKada.ml' readonly="readonly" ></td>
        </tr>
		
        <tr>
            <td>Customer Name:</td>
            <td><input type='text' name='c_name' class='form-control' value='Mr/Miss: <?php echo $row['c_name']; ?>' readonly="readonly" style="text-transform:capitalize;" ></td>
        </tr>
 
        <tr>
            <td>customer Email:</td>
            <td><input type='text' name='c_email' class='form-control' value='<?php echo $row['c_email']; ?>' readonly="readonly" ></td>
        </tr>

		 <tr>
            <td>Message:</td>
            <td>
			<textarea  rows="6" cols="40"  name='msg' class='form-control'  style="text-transform:capitalize;">Mr/Miss: <?php echo $row['c_name']; ?> , your bill amount is Rs-<?php echo $row['amount']; ?> 
			</textarea> </td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="semail" id="semail"><span class="glyphicon glyphicon-usd"></span>
                &nbsp;
    		 Send Bill
			</button>
            </td>
        </tr>
 
    </table>
</form>
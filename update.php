<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$id = $_POST['c_id'];
		$c_name = $_POST['c_name'];
		$mobile = $_POST['mobile'];
		$amount = $_POST['amount'];
		$c_email = $_POST['c_email'];
		$stmt = $db_con->prepare("UPDATE customers SET c_name=:en, mobile=:ed, amount=:es, c_email=:ce WHERE c_id=:id");
		$stmt->bindParam(":en", $c_name);
		$stmt->bindParam(":ed", $mobile);
		$stmt->bindParam(":es", $amount);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":ce", $c_email);
		
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}

?>
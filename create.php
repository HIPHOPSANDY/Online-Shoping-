
<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$adid = $_POST['adid'];
		$admail = $_POST['admail'];
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$mobile = $_POST['mobile'];
		$amount = $_POST['amount'];
		
		try{
			
			$stmt = $db_con->prepare("INSERT INTO customers(c_name,mobile,amount,admail,adid,c_email) VALUES(:cname, :cno, :camount, :admail, :adid, :cemail )");
			$stmt->bindParam(":cname", $c_name);
			$stmt->bindParam(":cno", $mobile);
			$stmt->bindParam(":camount", $amount);
			$stmt->bindParam(":admail", $admail);
			$stmt->bindParam(":adid", $adid);
			$stmt->bindParam(":cemail", $c_email);
			if($stmt->execute())
			{
				echo "Successfully Added";
			}
			else{
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>
<?php

	// this will avoid mysql_connect() deprecation error.
 	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	

	
    $host ="localhost";
    $user = "root";
    $password = "";
    $dbname = "sbdb";
    
 $con = mysqli_connect($host,$user,$password,$dbname);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	
//	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
//	$conn = mysql_connect($host,$user,$password,$dbname);
//	$dbcon = mysql_select_db(DBNAME);
	
//	if ( !$conn ) {
//		die("Connection failed : " . mysqli_error());
//	}
	
	?>
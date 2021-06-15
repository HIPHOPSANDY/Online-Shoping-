<?php
require_once 'dbconfig.php';
require_once'dbconnect.php';
if($_POST)
 {
	$id = $_POST['adid'];
	$msg = $_POST['msg'];
	$comp = $_POST['comp'];
$sql="select * from customers where adid='".$id."'";
$res=mysqli_query($con,$sql);
	
require 'PHPMailer-master/PHPMailerAutoload.php';

if (empty($errors)) {
    $mail = new PHPMailer;					    //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {
														// Enable verbose debug output
//$mail->SMTPDebug = 3;                               	// Enable verbose debug output
$mail->isSMTP();                                        // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; 					    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = 'nambakada2017@gmail.com';              // SMTP username
$mail->Password = 'nambakada0303';                          // SMTP password
$mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                      // TCP port to connect to
$mail->SMTPAuth=true;  
$mail->From = 'nambakada2017@gmail.com';
$mail->FromName = 'NambaKada.ml';
while(($row=mysqli_fetch_assoc($res))!= null)
{
$mail->addAddress($row['c_email']);    					    // Add a recipient
$mail->addReplyTo($row['c_email']);
$mail->isHTML(true);                                    // Set email format to HTML
$mail->Subject = 'Mail from NambaKada.ml, About new offer in our company  - '.$comp;
$mail->Body    =  $msg.'. Take our Offers and Enjoy with it. Thank you.';    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
		$sends=0;
    } else {
        //echo 'Message has been sent';
		$sends=1;
    }
    $errors[] = "Send mail sucsessfully";
}
if($sends==1)
echo '<script>("Message has been sent"); window.location.href="../home.php"
</script>';
} catch (phpmailerException $e) {
    $errors[] = $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    $errors[] = $e->getMessage(); //Boring error messages from anything else!
}
}
}
?>
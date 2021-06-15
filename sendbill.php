<?php
require_once 'dbconfig.php';

	
if($_POST)
 {
	$c_email = $_POST['c_email'];
	$msg     = $_POST['msg'];
	
require 'PHPMailer-master/PHPMailerAutoload.php';

if (empty($errors)) {
    $mail = new PHPMailer;					    //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {
														// Enable verbose debug output
//$mail->SMTPDebug = 3;                               	// Enable verbose debug output
$mail->isSMTP();                                        // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; 					    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = 'udhaya256@gmail.com';              // SMTP username
$mail->Password = 'udhAyA@14';                         // SMTP password
$mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                      // TCP port to connect to
$mail->SMTPAuth=true;                                   // TCP port to connect, tls=587, ssl=465
$mail->From = 'udhaya256@gmail.com';
$mail->FromName = 'NambaKada.ml';
$mail->addAddress($c_email);    					    // Add a recipient
$mail->isHTML(true);                                    // Set email format to HTML
$mail->Subject = 'Mail from NambaKada.ml for your purchasing details';
$mail->Body    =  $msg.'. Please, pay the amount with out delay. Thank you.';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '<script>("Message has been sent"); window.location.href="../home.php"
		
		</script>';
		header("Location: home.php");
    }
} catch (phpmailerException $e) {
    $errors[] = $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    $errors[] = $e->getMessage(); //Boring error messages from anything else!
}
}
}
?>
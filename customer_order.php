<?php
require_once 'dbconfig.php';

	
if($_POST)
 {
	$frm     = $_POST['from'];
	$msg     = $_POST['orders'];
	$to      = $_POST['to'];
	$dplace  = $_POST['dplace'];
	
	
require 'PHPMailer-master/PHPMailerAutoload.php';

if (empty($errors)) {
    $mail = new PHPMailer;					    //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {
														// Enable verbose debug output
//$mail->SMTPDebug = 0;                               	// Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'nambakada2017@gmail.com';                 // SMTP username
$mail->Password = 'nambakada0303';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
//$mail->SMTPAuth=true;
$mail->setFrom('nambakada2017@gmail.com', 'NambaKada');
$mail->addAddress($to);    					    // Add a recipient
$mail->isHTML(true);                                   // Set email format to HTML
$mail->Subject = 'Mail from NambaKada for your Ordering details to -'.$frm;
$mail->Body    =  $msg.'. Please, delivery the product to this place -'.$dplace;
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
echo '<script>("Message has been sent"); window.location.href="../customer.php"
		
		</script>';
    }
} catch (phpmailerException $e) {
    $errors[] = $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    $errors[] = $e->getMessage(); //Boring error messages from anything else!
}
}
}
?>
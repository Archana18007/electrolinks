<?php
error_reporting(E_ALL);
function curlRequest($url)
{
    $ch = curl_init();
    $getUrl = $url;
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
    
    $response = curl_exec($ch);
    return $response;
    
    curl_close($ch);
    
}


$emailAddress = 'archa.bnc@gmail.com'; //To address

require "phpmailer-ysh/class.phpmailer.php";

$fname=$_POST['contact-name'];
$femail=$_POST['contact-email'];
$pho=$_POST['contact-phone'];
$ymsg=$_POST['contact-infos'];




$msg='
<table border="0" cellpadding="6">

<tr>
    <td>Full Name : </td>
    <td> '.$fname.'</td>
</tr>
<tr>
    <td>Email : </td>
    <td> '.$femail.'</td>
</tr>
<tr>
    <td>Phone : </td>
    <td> '.$pho.'</td>
</tr>

<tr>
    <td>Message : </td>
    <td> '.$ymsg.'</td>
</tr>

';



$mail = new PHPMailer();
$mail->IsMail();

#$mail->SMTPDebug = 4;
$mail->IsSMTP();                // Sets up a SMTP connection
$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization  
$mail->SMTPSecure = "tls";      // Connect using a TLS connection  
$mail->Host = "smtp.gmail.com";  
$mail->Port = 587;  
$mail->Encoding = '7bit';    
         
//Authentication  
$mail->Username   = "avanzerkerala@gmail.com"; // Login  
$mail->Password   = "ffknfzpbxdwtzgpt"; // Password  
     
$mail->Subject="Message From Electrolinks Website Contact Form";
$mail->AddReplyTo($femail, $ftname);
$mail->AddAddress($emailAddress);
$mail->SetFrom('avanzerkerala@gmail.com',"Electrolinks Website");
$mail->MsgHTML($msg);
$mail->Send();
unset($mail);



    
        ?>
       
     <script type="text/javascript">
          alert("Thank You...");
          window.location="contact.html";
        </script>

  
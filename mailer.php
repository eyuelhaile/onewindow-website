<?php 
//Load Composer's autoloader
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
	if(isset($_POST['subject'])) {
        
        

        //Load Composer's autoloader
        require 'vendor/autoload.php';
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        

        $message = "<table style='width: 100%;border-collapse: collapse;text-align: left;border-radius: 10px 10px 10px 0;overflow: hidden;'>
                       <tr>
                           <td width='20%'>Email</td>
                           <td width='80%'>".$_POST['email']."</td>
                       </tr>
                       <tr>
                           <td width='20%'>Subject</td>
                           <td width='80%'>".$_POST['subject']."</td>
                       </tr>
                       <tr>
                           <td width='20%'>Message</td>
                           <td width='80%'>".$_POST['message']."</td>
                       </tr>
                   </table>";
       
        
        try {
            //Server settings
            $mail->IsSMTP(); // we are going to use SMTP
	        $mail->SetLanguage("en");
	        $mail->SMTPAuth   	= true; // enabled SMTP authentication
	        $mail->SMTPSecure 	= "ssl";  // prefix for secure protocol to connect to the server
	        $mail->Host       	= "mail.ethiofarmapp.com";      // SMTP server
	        $mail->Port       	= 465;                   // SMTP port to connect
	        $mail->Username   	= "crm@ethiofarmapp.com";  
	        $mail->Password   	= "eyu091332el";            
	        $mail->From     	= "crm@ethiofarmapp.com";
	        $mail->FromName 	= "Binget Wallet Transact";
	        $mail->isHTML(true);
	        $mail->Subject    	= "Contact Us Form";
	        $mail->Body    		= $message;
	        $mail->AltBody    	= "Plain text message";
            $mail->AddAddress("eyuelhaile29@gmail.com");
	 		$mail->AddBCC("solaye50@gmail.com");
	 		if(!$mail->Send())
	            $arr = array("success"=> false, "data"=>"Connection Problem / Error: " . $mail->ErrorInfo);
	        else
	            $arr = array("success"=> true, "data"=>"Successfully Sent! Thank you!");
            header("Location: success_contact.html");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        		}
?>        
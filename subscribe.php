<?php 
//Load Composer's autoloader
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
	if(isset($_POST['email'])) {
   //Load Composer's autoloader
        require 'vendor/autoload.php';
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        

        $message = "New Subscriber Email: ".$_POST['email'];
       
        
        try {
            //Server settings
            $mail->IsSMTP(); // we are going to use SMTP
	        $mail->SetLanguage("en");
	        $mail->SMTPAuth   	= true; // enabled SMTP authentication
	        $mail->SMTPSecure 	= "ssl";  // prefix for secure protocol to connect to the server
	        $mail->Host       	= "mail.onewindowpt.com";      // SMTP server
	        $mail->Port       	= 465;                   // SMTP port to connect
	        $mail->Username   	= "info@onewindowpt.com";  
	        $mail->Password   	= "5I7f,aEJ+1v0";            
	        $mail->From     	= "info@onewindowpt.com";
	        $mail->FromName 	= "One Window";
	        $mail->isHTML(true);
	        $mail->Subject    	= "One Window Subscriber";
	        $mail->Body    		= $message;
	        $mail->AltBody    	= "Plain text message";
            $mail->AddAddress("eyuelhaile29@gmail.com");
	 		$mail->AddBCC("solaye50@gmail.com");
	 		if(!$mail->Send())
	            $arr = array("success"=> false, "data"=>"Connection Problem / Error: " . $mail->ErrorInfo);
	        else
	            $arr = array("success"=> true, "data"=>"Successfully Sent! Thank you!");
            echo "<script>alert('Successfully subscribed')</script>";
            header("Location: success_subscriber.html");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}
?>        
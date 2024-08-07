<?php 
// Include config file 
require_once 'config.php'; 
 
// Include Subscriber class 
require_once 'subscriber.class.php'; 
$subscriber = new Subscriber(); 
 
if(isset($_POST['subscribe'])){ 
    $errorMsg = ''; 
    // Default response 
    $response = array( 
        'status' => 'err', 
        'msg' => 'Something went wrong, please try after some time.' 
    ); 
     
    // Input fields validation 
    if(empty($_POST['name'])){ 
        $pre = !empty($msg)?'<br/>':''; 
        $errorMsg .= $pre.'Please enter your full name.'; 
    } 
    if(empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
        $pre = !empty($msg)?'<br/>':''; 
        $errorMsg .= $pre.'Please enter a valid email.'; 
    } 
     
    // If validation successful 
    if(empty($errorMsg)){ 
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $verify_code = md5(uniqid(mt_rand())); 
         
        // Check whether the given email already exists 
        $con = array( 
            'where' => array( 
                'email' => $email 
            ), 
            'return_type' => 'count' 
        ); 
        $prevRow = $subscriber->getRows($con); 
         
        if($prevRow > 0){ 
            $response['msg'] = 'Your email already exists in our subscribers list.'; 
        }else{ 
            // Insert subscriber info 
            $data = array( 
                'name' => $name, 
                'email' => $email, 
                'verify_code' => $verify_code 
            ); 
            $insert = $subscriber->insert($data); 
             
            if($insert){ 
                // Verification email configuration 
                $verifyLink = $siteURL.'verify.subscription.php?email_verify='.$verify_code; 
                $subject = 'Confirm Subscription'; 
     
				$message = '<p style="color:#262626;text-align:left; font-size:14px; line-height: 24px padding:40px;" >Dear wolf cub, <br><br>Welcome to the family! We will be in touch soon :) <br><a href="'.$verifyLink.'" style="color:#15c;text-align:left; font-size:14px; text-decoration:none; font-weight: bold;" >Click here</a> to verify your email. <br><br>Sending you magic,<br>Megha Rao'; 
				
                $headers = "MIME-Version: 1.0" . "\r\n";  
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";  
                $headers .= "From: $siteName"." <".$siteEmail.">"; 
                 
                // Send verification email 
                $mail = mail($email, $subject, $message, $headers); 
                 
                if($mail){ 
                    $response = array( 
                        'status' => 'ok', 
                        'msg' => 'A verification link has been sent to your email address,<br> please check your email and verify.' 
                    ); 
                } 
            } 
        } 
    }else{ 
        $response['msg'] = $errorMsg; 
    } 
     
    // Return response 
    echo json_encode($response); 
} 
?>
<?php 
// Include config file

$title = 'Email Verification | Megha Rao';
include( "header.php" );
require_once 'config.php'; 
 
// Include Subscriber class 
require_once 'subscriber.class.php'; 
$subscriber = new Subscriber(); 
 
if(!empty($_GET['email_verify'])){ 
    $verify_code = $_GET['email_verify']; 
    $con = array( 
        'where' => array( 
            'verify_code' => $verify_code 
        ), 
        'return_type' => 'count' 
    ); 
    $rowNum = $subscriber->getRows($con); 
    if($rowNum > 0){ 
        $data = array( 
            'is_verified' => 1 
        ); 
        $con = array( 
            'verify_code' => $verify_code 
        ); 
        $update = $subscriber->update($data, $con); 
        if($update){ 
            $statusMsg = '<p class="success">Your email address has been verified successfully.</p>'; 
        }else{ 
            $statusMsg = '<p class="error">Some problem occurred on verifying your email, please try again.</p>'; 
        } 
    }else{ 
        $statusMsg = '<p class="error">You have clicked on the wrong link, please check your email and try again.</p>'; 
    } 
?>  
<main class="animsition" >
  <div class="section">
    <div class="container container_space" >
      <div class="row justify-content-center" >
        <div class="col-sm-8 col-md-10 col-lg-6" >
          <div class="row justify-content-center " >
            <div class="col-sm-12 col-md-6 mb-2" >
              <figure class="section_icon contact_icon mb-2" > </figure>
              <div class="section_title text-center " >thank you</div>
            </div>
          </div>
          <div class="row justify-content-center" >
            <div class="col-sm-12 text-center " >
              <div class="paragraph" >
                <p><?php echo $statusMsg; ?></p>
                <div class="content_border mt-2 mb-3"><span></span></div>
                <a href="index.php" class="link"  >go to homepage</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include("footer.php"); 
} 
?>
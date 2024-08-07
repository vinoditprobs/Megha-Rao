<?php
$title = 'Sign Up | Megha Rao';
$bodyclass = 'sign_up';
$MetaTitle = 'Sign Up | Megha Rao';
$Metadescription = 'Megha Rao';
$MetaImage = '';
$MetaUrl = '';
include( "header.php" );
?>
<main class="animsition" >
  <div class="section">
    <div class="container container_space" >
      <div class="form_wrapp" >
        <form action="#" id="subsFrm" method="post" >
          <div class="row justify-content-center" >
            <div class="col-sm-8 col-md-10 col-lg-6" >
              <div class="row justify-content-center mb-4" >
                <div class="col-sm-12 col-md-6 mb-3" >
                  <figure class="section_icon" > </figure>
                </div>
              </div>
              <div class="row justify-content-center mb-4" >
                <div class="col-sm-12 col-md-6" >
                  <div class="input_field" >
                    <div class="input" >
                      <input type="text"id="name" required placeholder="name" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6" >
                  <div class="input_field" >
                    <div class="input" >
                      <input type="email" id="email" required placeholder="email" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mb-4" >
                <div class="col-sm-12 col-md-6" >
                  <div class="input_field mb-0" > 
                    <!--<button class="btn full" >hear from me</button>-->
                   <!-- <button type="submit" class="btn full" name="submit">hear from me</button>-->
					  <button type="button" class="btn full" id="subscribeBtn">hear from me</button>
                  </div>
                </div>
              </div>
				
				<div class="row justify-content-center" >
                <div class="col-sm-12  text-center" >
                 <div class="paragraph">
					<p class="status" ></p>
					</div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include("footer.php"); ?>

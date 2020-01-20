<?php 
$recoveryPass='';
include 'inc/header.php';
?>
<?php 
           
  $user = new User();

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['recovery'])){ 
    $recoveryPass = $user->varifyRecoveryPassword($_POST);  
  }


?>

  <!--..........................................................................................................-->
  <!--Second Section-->
  <section id="Forgot_password_section" >
    <div class="container">    
      <div class="row">
        <div class="col">
            <h2 class="title pt-3"><i class="mx-2 fa fa-lock" aria-hidden="true"></i>Password Recovery</h2>   
            <p class="sub_title ">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> 
            <?php 
                            if($recoveryPass){
                              echo $recoveryPass;
                            }
                          ?>  
            <div class="recovery_box">         
                 <div class="recovery_box_content "> 
                      <div class="row">
                        <div class="col-12">
                          
                            <form action="" method="POST">
                                <div class="form-group">
                                    <h4 class="warn"> <i class="fa fa-warning"></i> Input all field correctly to recovery your password!</h4>
                                    <label for="bloodgroup" class="font-weight-bold ">1. Select your blood group </label>
                
                                    <select id="bloodgroup" name="bloodgroup" class="form-control" >
                                      <option value="A+" selected>A+</option>
                                      <option value="AB+">AB+</option>
                                      <option value="A-">A-</option>
                                      <option value="AB-" >AB-</option>
                                      <option value="O+" >O+</option>
                                      <option value="O-" >O-</option>
                                      <option value="B+" >B+</option>
                                      <option value="B-" >B-</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="usernumber" class="font-weight-bold">2. Type your Phone number</label>
                                    <input id="phonenumber" type="number" name="phonenumber" class="form-control" placeholder="Type your phone no" value="01770703320">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">3. Type your Email</label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Type your email">
                                </div>
                                
                                <input type="submit" name="recovery" value="Click to Recovery" class="btn mb-3">
                                
                            </form>
                        </div>
                      </div>
                 </div>
              </div>
        </div>
      </div>
    </div>
     
  </section>
  <!--...........................................................................................................-->








  </body>
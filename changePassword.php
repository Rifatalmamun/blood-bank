<?php 
$updatPass='';
  include_once "inc/header.php";
  Session::checkSession();
  $user = new User();
  $loginId = Session::get('id');

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepassword'])){ 
    $updatPass = $user->updataPassword($loginId,$_POST); 
  }

?>


<section id="Change_password_section">
<div class="container">

<div class="row">
      <div class="col">
      <?php 
                  if($updatPass){
                    echo $updatPass;
                  }

            ?>
        <h2 class="title my-3"><span><i class="px-2 fa fa-lock" aria-hidden="true"></i></span>Update Password</h2>
        <p class="sub_title">Lorem ipsum dolor sit amet.</p>
      <div class="update_box">
          <form action="changePassword.php" method="POST" class="mt-3">
              <div class="form-group">
              <label>Current Password</label>
              <input name="current_password" type="password" class="form-control" placeholder="Type your current password" >
              </div>
              <div class="form-group">
              <label>New Password</label>
              <input name="new_password" type="password" class="form-control" placeholder="Type your new password">
              </div>
              <div class="form-group">
              <label>Confrim Password</label>
              <input name="new_password_again" type="password" class="form-control" placeholder="Type your new password again"> 
              </div>
    
              <input type="submit" name="updatepassword" value="Update password" class="btn">
              <!-- <button class="btn frgtpass">Forgot password</button> -->
              <a href="forgotpassword.php" class="btn frgtpass">Forgot password</a> 

              <a href="profile.php" class="btn">Back to profile</a>  
            </form>
      </div>
        
      </div>
    </div>



    </div>
</section>



<script>
  function myFunction(){}
</script>

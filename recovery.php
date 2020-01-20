<?php 
$recov='';
include 'inc/header.php';

$user = new User();

//$recEmail = $_GET['recoEmail'];


if(!isset($recEmail)){
  Session::init();
  $recEmail = Session::get('recEmail');
}

if(empty($recEmail)){
  header('Location: index.php'); 
}

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['recov'])){ 
    $recov = $user->recoveryPassword($recEmail,$_POST); 
}

    //echo 'We got: '.$recEmail;

?>

<section id="recovery_password_section">
<div class="container">

<div class="row">
    <div class="col-md-2"></div>
      <div class="col-md-8">
      <?php 
                  if($recov){
                    echo $recov;
                  }

            ?>
      <div class="update_box">
          <form action="" method="POST" class="mt-3">
              <div class="form-group">
              <label>New Password</label>
              <input name="new_password" type="password" class="form-control " placeholder="Type your new password">
              </div>
              <div class="form-group">
              <label>Confrim Password</label>
              <input name="new_password_again" type="password" class="form-control" placeholder="Type your new password again"> 
              </div>
    
              <input type="submit" name="recov" value="Set password" class="btn btn-danger">
         
            </form>
      </div>
        
      </div>
      <div class="col-md-2"></div>
    </div>



    </div>
</section>
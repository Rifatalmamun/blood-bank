
<?php 
$userLogin = '';
  include 'inc/header.php';
  
  $user = new User();

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    $userLogin = $user->userLogin($_POST); 
  }
?>

  <!--..........................................................................................................-->
  <!--Second Section-->
  <section id="Login_section" >
    <div class="container">    
      <div class="row">
        <div class="col">
            <h2 class="title pt-3"><i class="mx-2 fa fa-lock" aria-hidden="true"></i>User Login</h2>   
            <p class="sub_title ">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> 

            <?php 
              if($userLogin){
                echo $userLogin;
              }
            ?>

            <div class="login_box">         
                 <div class="login_box_content text-center"> 
                      <div class="row">
                        <div class="col-6">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Type your email address">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Type your password">
                                </div>
                                <input type="submit" name="login" value="Click to Login" class="btn ">
                                <p class="mt-2"><small class="text-muted">Not Registered?</small><a href="registration.php" class="mx-1">Create an account</a></p>
                                <a href="forgotpassword.php"><small>forgot password</small> </a>
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




  <?php 
  include_once "inc/footer.php";

?>
<script>
  function myFunction(){}
</script>




  </body>
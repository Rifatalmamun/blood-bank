<?php 

  include  'lib/user.php';

  $filepath=realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Session.php';
    Session::init();

    if(isset($_GET['action']) && $_GET['action']=="logout"){
      Session::destroy();
    }


    $id = Session::get('id');
    $userlogin = Session::get('login');

?>

<?php
  $page='';

  $uri = $_SERVER['REQUEST_URI'];

    if (strpos($uri, 'index') !== false) {
      $page="1";
    }
    else if (strpos($uri, 'bloodbank') !== false) {
      $page="2";
    }
    else if (strpos($uri, 'ambulance') !== false) {
      $page="3";
    }
    else{
      $page = "4";
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- FONT AWESOME CDN LINK-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <!-- BOOTSTRAP LINK-->
  <link rel="stylesheet" href="css/bootstrap.css"> 
  <!-- CSS LINK-->
  <link rel="stylesheet" media="all" href="scss/style.css">
  

  <title>BLOOD BANK JUST</title>

</head>

<body  id="body" onload="myFunction()">



  <!--First Section-->
  <section class="First_section"> 
    <div class="container"> 
      <div class="row">
        <div class="col-md-2">
          <div class="logo_box text-center ">
              <img src="img/logo.png" alt="logo">  
              <!-- <i class=" globe fa fa-globe"></i> --> 
              <h4 >BLOOD BANK,JUST </h4>  
          </div>
        </div>
        <div class="col-md-5">
          <div class="contact_box ">
              <div class="d-flex flex-row mt-2">
                  <div class="align-self-start">
                    <img src="img/ambulance.svg" alt="not found">
                  </div>
                  <div class="align-self-end">
                    <p >01234567891 (JUST Ambulence)</p> 
                  </div>
                </div>
          </div>
            
        </div>
        <div class="col-md-5 text-center">
          <div class="third_part">
              
              <p>Donate your blood for a reason, let the reason to be life</p>  
              <?php 
                  if($userlogin==false){
              ?>
              <a href="registration.php" class="btn mt-3"> <i class="fa fa-lock "></i> Registration </a> <br>
              <?php }else{ ?>

                <a href="profile.php" class="btn  "> <i class="fa fa-user "></i> My Profile</a> <br> 
                <?php }?>
                <?php 
                  if($userlogin==true){
              ?>
                <a href="?action=logout"  class="btn hide  my-2 ">Logout</a> 
                <?php }else{ ?>
              <a href="login.php" class="btn hide my-2">Login</a>  
              <?php } ?> 
          </div>
          
        </div>
      </div>
    </div>
     <!--nav item-->
     <nav class="navbar navbar-expand-sm">
        <a href="index.php" class="narbar-brand text-capitalize web_name"> 
          <!-- <img src="img/logo.png" alt="LOGO"> -->
        </a>
        <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myNavbar">
            <span>
              <i class="text-light fa fa-bars"></i>
            </span>
        </button> 
        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="navbar-nav ml-auto  first_nav_item">
              <li id="home" class="nav-item "><a class="nav-link  " href="index.php"> <i class="fa fa-home"></i> Home</a></li>
              <li id="bloodbank" class="nav-item"><a class="nav-link" href="bloodbank.php"><i class="fa fa-tint mx-1"></i>Blood Bank</a></li>
              <li id="ambulance" class="nav-item"><a class="nav-link" href="ambulance.php"><i class="fa fa-ambulance mx-1"></i>Ambulance</a></li>
              <li id="facts1" class="nav-item sinsm"><a class="nav-link " href="fact.php"><i class="fa fa-question"></i>Facts</a></li> 
              <li id="facts2" class="nav-item sinlg"><a class="nav-link " href="fact.php"><i class="fa fa-question mx-1"></i>Blood Donation Facts</a></li> 
              <!-- <li class="nav-item"><a class="nav-link " href="searchResult.html"><i class="fa fa-home"></i>About us</a></li>  -->
          </ul>
          <ul class="navbar-nav ml-auto second_nav_item">
          <?php 
            if($userlogin==true){
          ?>
              <li class="nav-item   "><a class="nav-link" href="?action=logout"><i class="fa fa-sign-out"></i>Logout </a></li>
              <?php }else{?>
              <li class="nav-item  "><a class="nav-link ml-2" href="login.php"><i class="fa fa-lock"></i> Login </a></li>
              <?php } ?>
          </ul>
        </div>
      </nav>
  </section>
  
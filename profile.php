<?php 
$updateuser = '';
$updatepass = '';
include 'inc/header.php';
Session::checkSession();
?>
<?php 
  $user = new User();

  $loginId = Session::get('id');


  $profileData = $user->getUserDataById($loginId);
  $bloodgrp  = $profileData->bloodgroup;
  $locatn    = $profileData->location;
  $sessn     = $profileData->session;
  $gendr     = $profileData->gender;
  
  // for gender index.....

  if($gendr=='male'){
    $gnd_ind = '0';
  }else{
    $gnd_ind = '1';
  }

  // for blood group......
  if($bloodgrp=='A+'){
    $bg_item = '0';                                                
  }else if($bloodgrp=='AB+'){
    $bg_item = '1';
  }else if($bloodgrp=='A-'){
    $bg_item = '2';
  }else if($bloodgrp=='AB-'){
    $bg_item = '3';
  }else if($bloodgrp=='O+'){
    $bg_item = '4';
  }else if($bloodgrp=='O-'){
    $bg_item = '5';
  }else if($bloodgrp=='B+'){
    $bg_item = '6';
  }else if($bloodgrp=='B-'){
    $bg_item = '7';
  }

  // echo "<script type='text/javascript'>alert('$bg_item');</script>";

  if($locatn=='SMRH, JUST'){ 
    $lc_item = 0;
  }else if($locatn=='SHH, JUST'){
    $lc_item = 1;
  }else if($locatn=='DORMETORY, JUST'){ 
    $lc_item = 2;
  }else if($locatn=='Ambottola'){
    $lc_item = 3;
  }else if($locatn=='Arabpur'){
    $lc_item = 4;
  }else if($locatn=='Chachra'){
    $lc_item = 5;
  }else if($locatn=='Chowgacha'){
    $lc_item = 6;
  }
  else if($locatn=='Curamonkhati'){
    $lc_item = 7;
  }
  else if($locatn=='Dhormotola'){
    $lc_item = 8;
  }
  else if($locatn=='Doratana'){
    $lc_item = 9;
  }
  else if($locatn=='Kathaltola'){
    $lc_item = 10;
  }
  else if($locatn=='Monihar'){
    $lc_item = 11;
  }
  else if($locatn=='NewMarket'){
    $lc_item = 12;
  }
  else if($locatn=='Palbari'){
    $lc_item = 13;
  }
  else if($locatn=='RailStation'){
    $lc_item = 14;
  }


  // if($gndr =='Male'){
  //   $gn_item = 0;
  // }else if($gndr =='Female'){
  //   $gn_item = 1;
  // }

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){ 
    $updateuser = $user->updateUserData($loginId,$_POST); 
  }

?>

 <!--...........................................................................................................--> 
<section id="Profile_section" class="bg-light">
<div class="container">
    <div class="row">
        <div class="col">
            <img src="img/jbb_profile.svg" alt="profile" class="d-none">
            <h2 class="title my-3"> Welcome <?php echo $profileData->name ?>!</h2> 
            <?php 
                  if($updateuser){
                    echo $updateuser;
                  }

            ?>

        </div>
    </div>
    <div class="profile_box p-5 " id="profileBox">
    <div class="row">
      <?php 
          if($profileData){
      ?>
    <div class="col-md-6">
        
        <p><span><i class="fa fa-user " aria-hidden="true"></i></span><strong>Name:</strong> <?php echo $profileData->name ?></p>
        <p><span><i class="fa fa-tint " aria-hidden="true"></i></span><strong>Bloodgroup:</strong> <?php echo $profileData->bloodgroup ?></p>
        <p><span><i class="fa fa-phone " aria-hidden="true"></i></span><strong>Phone:</strong> <?php echo $profileData->phone ?></p> 
        <p><span><i class="fa fa-map-marker " aria-hidden="true"></i></span><strong>Location:</strong> <?php echo $profileData->location ?></p> 

    </div>
    <div class="col-md-6">
        <p><span><i class="fa fa-envelope " aria-hidden="true"></i></span><strong>Email:</strong> <?php echo $profileData->email ?></p>     
        <p class="hdst"><span><i class="fa fa-graduation-cap " aria-hidden="true"></i></span><strong>Department:</strong> <?php echo $profileData->department ?></p>
        <p class="hds"><span><i class="fa fa-male " aria-hidden="true"></i></span><strong>Gender:</strong> <?php echo $profileData->gender ?></p>
        <p><span><i class="fa fa-calendar " aria-hidden="true"></i></span><strong>Last Donation Date:</strong> <?php echo $profileData->lastdonationdate ?></p> 
       
        
    </div>
    </div>
    <div class="row">
      <div class="col-6">
          <button id="update" onclick="hideProfileBox()" class="btn  ">Update profile</button>
      </div>
      <div class="col-6">
          <a href="changePassword.php" class="btn  ">Update password</a>
      </div>
      <?php }else{ ?>
        <p>Profile data not found</p>
    <?php } ?>
    </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
          <div class="shadow_box" id="profileFrom"> 
            <form action='' method='post' >
                <div class="row">
                    <div class="col-sm-6">
                      
                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Type your name" value="<?php echo $profileData->name?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="bloodgroup">Select blood group </label>
                <select id="bloodgroup" name="bloodgroup" class="form-control" size="1">
                  <option value="A+"  >A+</option>
                  <option value="AB+" >AB+</option>
                  <option value="A-"  >A-</option>
                  <option value="AB-" >AB-</option>
                  <option value="O+"  >O+</option>
                  <option value="O-"  >O-</option>
                  <option value="B+"  >B+</option>
                  <option value="B-"  >B-</option>
                </select>
              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                <label for="usernumber">Phone</label>
                <input id="phonenumber" type="number" name="phonenumber" class="form-control" placeholder="Type your phone no" value="<?php echo $profileData->phone?>"> 
                
              </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="username">Your location</label>
                <select id="location" name="location" class="form-control" size="1">
                    <option id="smr_hall_id" value="SMRH, JUST">Shahid Mosiur Rahman Hall,JUST</option>
                    <option id="shh_hall_id" value="SHH, JUST">Sheikh Hasina Hall,JUST</option>
                    <option id="dormetory_id" value="DORMETORY, JUST">Dormetory,JUST</option>
                    <option value="Ambottola">Ambottola</option>
                    <option value="Arabpur">Arabpur</option>
                    <option value="Chachra">Chachra</option>
                    <option value="Chowgacha">Chowgacha</option>
                    <option value="Curamonkhati">Curamonkhati</option>
                    <option value="Dhormotola">Dhormotola</option>
                    <option value="Doratana">Doratana</option>
                    <option value="Kathaltola">Kathaltola</option>
                    <option value="Monihar">Monihar</option>
                    <option value="NewMarket">New Market</option>
                    <option value="Palbari">Palbari</option>
                    <option value="RailStation">Rail Station</option>
                </select>
              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label for="gender">Gender </label><br>
                            
                            <select id="gender" name="gender" class="form-control"> 
                              <option value="male" selected>Male</option> 
                              <option value="female" >Female</option>
                            </select>

                    
                   </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="email">Email</label> 
                  <input id="email" type="emial" name="email" class="form-control"  placeholder="Type email" value="<?php echo $profileData->email?>">
              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <!--...............................................................................................-->
                <div class="row">
                    <div class="col-12">
                    <div class="form-group last_date_box">
                        <label for="user_paswwrord" class="font-weight-bold">Did you remember last blood donation date? </label> <br>
                        <input onclick="hideFunction()" type="radio" value="no" name="lastDateReminder" checked> <span class="font-weight-bold">No</span>
                        <input onclick="showFunction()" id="yesId" type="radio" value="yes" name="lastDateReminder"> <span class="font-weight-bold">Yes</span>
                        <label id="date_format" for="dateInput">Month-Day-Year</label>
                        <input id="dateInput" name="lastdonationdate" type="date" class="form-control"  placeholder="Type date" value="<?php echo $profileData->lastdonationdate?>"> 
                    </div>
                    </div> 
                </div>
                <!--...............................................................................................-->

                <div class="row">
                    <div class="col-sm-6 text-center">
                    <input  type="submit" name="update" value="Update Profile" class ="btn btn-primary mb-2">
                    </div>
                    <div class="col-sm-6 text-center ">
                <input onclick="hideProfileUpdateFrom()" type="reset" value="Back to profile" class ="btn btn-danger "> 
                    </div>
                </div>
            </form>
            </div> <!--shadow box-->
        </div>
    </div>
    <!--Update password section-->
    
</div>
</section>






<!--FOOTER SECTION-->


<?php 
  include_once "inc/footer.php";

?>





<script>
function myFunction(){}

window.scrollTo(0,286);

// set profile select option value by php and js
 var tBloodGroup = <?php echo $bg_item?>;
document.getElementById("bloodgroup").selectedIndex = tBloodGroup; 

var tLocation = <?php echo $lc_item?>;
document.getElementById("location").selectedIndex = tLocation;  

var tGender = <?php echo $gnd_ind?>;
document.getElementById("gender").selectedIndex = tGender;  




document.getElementById('profileFrom').style.display='none'; 

function hideProfileUpdateFrom(){

  document.getElementById('update').style.display='block';

  
  document.getElementById('profileFrom').style.display='none';
  document.getElementById('profileBox').style.display='block';

}
function hideProfileBox(){
  //console.log('work');
  //document.getElementById('update').style.display='none';

  var tBloodGroup = <?php echo $bg_item?>;
  document.getElementById("bloodgroup").selectedIndex = tBloodGroup; 

  var tLocation = <?php echo $lc_item?>;
  document.getElementById("location").selectedIndex = tLocation;  

  var tGender = <?php echo $gnd_ind?>;
  document.getElementById("gender").selectedIndex = tGender; 


  document.getElementById('profileFrom').style.display='block';
  document.getElementById('profileBox').style.display='none';

  
}




function hideFunction(){

let element =  document.getElementById('dateInput');
let element2 = document.getElementById('date_format');

element.style.transition='.5s';
element.style.opacity='0';

element2.style.transition='.5s';
element2.style.opacity='0';
}

function showFunction(){

let element =  document.getElementById('dateInput');
let element2 =  document.getElementById('date_format');

element.style.transition='.5s';
element.style.opacity='1';

element2.style.transition='.5s';
element2.style.opacity='1';
}

</script>
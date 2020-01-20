<?php 
$donorData = '';
  include 'inc/header.php';
  $user = new User();

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['searchdonor'])){ 
    $donorData = $user->searchDonor($_POST); 
  }else{
    $sbg = Session::get('searchDonorBloodGroup');                                              
    $sl = Session::get('searchDonorLocation');

    if($sbg && $sl){
      $donorData = $user->searchDonorFromIndex($sbg,$sl);  
    }
  }
?>

  <!--..........................................................................................................-->
  <!--Second Section-->
  <section id="Second_section">
    <div class="container">    
      <div class="row">
        <div class="col">
            <div class="emmergency_search_box">
                <h2 class="text-center  ">Emmergency Blood Search</h2>                  
                <img src="img/mobile_art.svg" alt="not found"> 
                 <div class="emmergency_search_box_content text-center">
                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-6">
                          <div class="blood_box">
                              <span><i class="fa fa-tint" aria-hidden="true"></i></span>
                              <label for="searchBloodGroup">Select Blood Group </label>
                          </div> 
                        </div>
                        <div class="col-6">
                            <select name = "bloodgroup" class="form-control" size="1">
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
                      </div>
                      <div class="row mt-3">
                          <div class="col-6">
                            <div class="city_box">
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                <label for="searchBloodGroup">Select Location</label> 
                            </div>
                          </div>
                          <div class="col-6">
                          <div class="form-group">
                              <select name="location" class="form-control" size="1">
                              <option  value="SMRH, JUST" selected>Shahid Mosiur Rahman Hall,JUST</option>
                                    <option value="SHH, JUST">Sheikh Hasina Hall,JUST</option>
                                    <option value="DORMETORY, JUST">Dormetory,JUST</option>
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
                      </div>
                   
                      <input onclick="hideBox()" id="resultTable" style="margin-left: 40%;" type="submit" name="searchdonor" value="Search Donor" class="btn btn-primary mt-3"> 

                 </form>
                 <div class="emmergency_search_box_footer">
                 </div>
              </div>
        </div>
      </div>
    </div>
     
  </section>

  <section id="clickSection" class="my-3">
  <div class="container">
  <div class="row">
  <div class="col">
    
      <span><img src="img/jbb_finddonor.svg" alt="find donor"></span>
      <p>Result of your searching</p>
      <button onclick="showBox()" id="clickButton" class="btn ">Click to Search Again</button>
    
  </div>
  </div>
  </div>
  </section>
  <!--...........................................................................................................-->
<section id="ResultSection">
  <div class="container">
  <?php 
        if($donorData){
          $i = 0;
          foreach($donorData as $sdata){
            $i++;

  ?>
    <div class="row">
      <div class="col-12">
        <div class="result_box bg-light">
          <div class="picture_box">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
          </div>
          <div class="info_box">
            <div class="row">
                <div class="col-md-6">
                <h4><?php echo $sdata['name'] ?></h4>
                    <h6>Blood Group: <span><?php echo $sdata['bloodgroup'] ?></span> </h6>
                    <h6>Phone: <?php echo $sdata['phone'] ?></h6>
                    <h6>Location: <?php echo $sdata['location'] ?></h6>  
                </div>
                <div class="col-md-6">
                <h6>Email: <?php echo $sdata['email'] ?></h6>
                <?php 
                      if($sdata['department']=='blank' or $sdata['department']=='Select one'){
                        $dd = '---';
                      }
                      else{
                        $dd = $sdata['department'];     
                      }
                    ?>
                    <h6 class="hideData">Department: <?php echo $dd ?></h6>
                    <?php 
                    if($sdata['usertype']=='Teacher'){
                        if($sdata['session']=='blank' or $sdata['session']=='Select one'){
                          $ss = $sdata['designation'] ;
                        }
                    }
                    if($sdata['usertype']=='Student'){
                      if($sdata['session']=='blank' or $sdata['session']=='Select one'){
                        $ss = '---' ;
                      }else{
                        $ss = $sdata['session'] ; 
                      }
                  }
                    ?>
                    <?php 
                  if($sdata['usertype']=='Teacher'){
                    ?>
                    <h6>Designation: <?php echo $sdata['designation'] ?></h6>    
                    <?php }else{ ?>

                      <h6>Session: <?php echo $sdata['session'] ?></h6>    
                      <?php }?>
                       
                    
                    <?php 
                      if($sdata['lastdonationdate'] =='0000-00-00'){
                        $tempLasDD = "I don't know";  
                    }else{
                      $tempLasDD=$sdata['lastdonationdate'];
                    }
                    ?>
                    <h6>Last Donation Date: <?php echo $tempLasDD ?></h6>    

                </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php }}else{ ?>
    
    <h4 class="text-danger display-4">No Donor found !</h4>  

  <?php } ?>
  </div>
</section>

<script>
function myFunction(){}

let element = document.getElementById('Second_section');
element.style.display = 'none';

function showBox()
{
  document.getElementById('Second_section').style.display = 'block';
  document.getElementById('clickButton').style.display = 'none';
  document.getElementById('searchDonor').style.display = 'none';
}
function hideBox()
{
  document.getElementById('Second_section').style.display = 'none';
  document.getElementById('clickButton').style.display = 'block';
  document.getElementById('searchDonor').style.display = 'block';
}


</script>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/main.js"></script>
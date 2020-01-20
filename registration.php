<?php 

$u_type='';
$locatn='';
$deprtmnt='';
$u_type_index='1'; 
$blood_index='';
$loc_index='';
$dep_index='';
$ses_index='';
$desig_index='';

$n        ='';
$bldgrp   ='Select one';
$p        ='';
$b        ='';
$e        ='';
$pass     ='';
$con_pass ='';
$last_date='';

$userReg='';

  include 'inc/header.php';
  Session::checkLogin();
?>
<?php 
  $user = new User();

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['registration'])){

    $u_type   = $_POST['usertype'];

    if($u_type=='Teacher'){                
      $u_type_index = 0;                     
    }else if($u_type=='Student'){                   
      $u_type_index = 1;                       
    }else if($u_type=='Others'){                   
      $u_type_index = 2;                                          
    }

    $n        = $_POST['name'];                                                    
    $bldgrp   = $_POST['bloodgroup'];                                                                                                                                                                          
    if($bldgrp=='Select one'){                
      $blood_index = 0;                     
    }else if($bldgrp=='A+'){                   
      $blood_index = 1;                       
    }else if($bldgrp=='AB+'){                   
      $blood_index = 2;                  
    }else if($bldgrp=='A-'){            
      $blood_index = 3;
    }else if($bldgrp=='AB-'){
      $blood_index = 4;
    }else if($bldgrp=='O+'){
      $blood_index = 5;
    }else if($bldgrp=='O-'){
      $blood_index = 6;
    }else if($bldgrp=='B+'){
      $blood_index = 7;
    }else if($bldgrp=='B-'){
      $blood_index = 8;
    }


//.................................................
if($u_type=='Teacher' or $u_type=='Student'){

  $deprtmnt=$_POST['department'];               

  if($deprtmnt=='Select one'){                
    $dep_index = 0;                     
  }else if($deprtmnt=='CSE'){                   
    $dep_index = 1;                       
  }else if($deprtmnt=='EEE'){                   
    $dep_index = 2;                  
  }else if($deprtmnt=='CHE'){                   
    $dep_index = 3;                  
  }else if($deprtmnt=='IP'){            
    $dep_index = 4;
  }else if($deprtmnt=='PME'){
    $dep_index = 5;
  }else if($deprtmnt=='Textile'){
    $dep_index = 6;
  }else if($deprtmnt=='BME'){
    $dep_index = 7;
  }else if($deprtmnt=='EST'){
    $dep_index = 8;
  }else if($deprtmnt=='NFT'){
    $dep_index = 9;
  }else if($deprtmnt=='APPT'){
    $dep_index = 10;
  }else if($deprtmnt=='CDM'){
    $dep_index = 11;
  }else if($deprtmnt=='FMB'){
    $dep_index = 12;
  }else if($deprtmnt=='Pharmacy'){
    $dep_index = 13;
  }else if($deprtmnt=='GBT'){
    $dep_index = 14;
  }else if($deprtmnt=='Microbiology'){
    $dep_index = 15;
  }else if($deprtmnt=='PESS'){
    $dep_index = 16;
  }else if($deprtmnt=='Nursing'){
    $dep_index = 17;
  }else if($deprtmnt=='Physiotherapy'){
    $dep_index = 18;
  }else if($deprtmnt=='Physics'){
    $dep_index = 19;
  }else if($deprtmnt=='Chemistry'){
    $dep_index = 20;
  }else if($deprtmnt=='Mathematics'){
    $dep_index = 21;
  }else if($deprtmnt=='English'){
    $dep_index = 22;
  }else if($deprtmnt=='AIS'){
    $dep_index = 23;
  }else if($deprtmnt=='Management'){
    $dep_index = 24;
  }else if($deprtmnt=='Finance and Banking'){
    $dep_index = 25;
  }else if($deprtmnt=='Marketing'){
    $dep_index = 26;
  }
}
//.................................................
    if($u_type=='Teacher'){
      $locatn   = $_POST['location'];
          if($locatn=='Select one'){
            $loc_index = 0;
          }else if($locatn=='DORMETORY, JUST'){
            $loc_index = 1;
          }else if($locatn=='Ambottola'){
            $loc_index = 4;
          }else if($locatn=='Arabpur'){
            $loc_index = 5;
          }else if($locatn=='Chachra'){
            $loc_index = 6;
          }else if($locatn=='Chowgacha'){
            $loc_index = 7;
          }else if($locatn=='Curamonkhati'){
            $loc_index = 8;
          }else if($locatn=='Dhormotola'){
            $loc_index = 9;
          }else if($locatn=='Doratana'){
            $loc_index = 10;
          }else if($locatn=='Kathaltola'){
            $loc_index = 11;
          }else if($locatn=='Monihar'){
            $loc_index = 12;
          }else if($locatn=='NewMarket'){
            $loc_index = 13;
          }else if($locatn=='Palbari'){
            $loc_index = 14;
          }else if($locatn=='RailStation'){
            $loc_index = 15;
          }

          //echo 'location index: '.$loc_index.'<br>';

          $desigNatn   = $_POST['designation'];

          if($desigNatn=='Select one'){
            $desig_index = 0;
          }else if($desigNatn=='Professor'){
            $desig_index = 1;
          }else if($desigNatn=='Associate professor'){
            $desig_index = 2;
          }else if($desigNatn=='Assistant professor'){
            $desig_index = 3;
          }else if($desigNatn=='Lecturare'){
            $desig_index = 4;
          }
    }

    if($u_type=='Student'){
      $locatn   = $_POST['location'];
          if($locatn=='Select one'){
            $loc_index = 0;
          }else if($locatn=='SMRH, JUST'){
            $loc_index = 2;
          }else if($locatn=='SHH, JUST'){
            $loc_index = 3;
          }else if($locatn=='Ambottola'){
            $loc_index = 4;
          }else if($locatn=='Arabpur'){
            $loc_index = 5;
          }else if($locatn=='Chachra'){
            $loc_index = 6;
          }else if($locatn=='Chowgacha'){
            $loc_index = 7;
          }else if($locatn=='Curamonkhati'){
            $loc_index = 8;
          }else if($locatn=='Dhormotola'){
            $loc_index = 9;
          }else if($locatn=='Doratana'){
            $loc_index = 10;
          }else if($locatn=='Kathaltola'){
            $loc_index = 11;
          }else if($locatn=='Monihar'){
            $loc_index = 12;
          }else if($locatn=='NewMarket'){
            $loc_index = 13;
          }else if($locatn=='Palbari'){
            $loc_index = 14;
          }else if($locatn=='RailStation'){
            $loc_index = 15;
          }

          //echo 'location index: '.$loc_index.'<br>';

        if($deprtmnt!='Select one'){
          $sesION   = $_POST['session'];

          if($sesION=='Select one'){
            $ses_index = 0;
          }else if($sesION=='2008-2009'){
            $ses_index = 1;
          }else if($sesION=='2009-2010'){
            $ses_index = 2;
          }else if($sesION=='2010-2011'){
            $ses_index = 3;
          }else if($sesION=='2011-2012'){
            $ses_index = 4;
          }else if($sesION=='2012-2013'){
            $ses_index = 5;
          }else if($sesION=='2013-2014'){
            $ses_index = 6;
          }else if($sesION=='2014-2015'){
            $ses_index = 7;
          }else if($sesION=='2015-2016'){
            $ses_index = 8;
          }else if($sesION=='2016-2017'){
            $ses_index = 9;
          }else if($sesION=='2017-2018'){
            $ses_index = 10;
          }else if($sesION=='2018-2019'){
            $ses_index = 11;
          }else if($sesION=='2019-2020'){
            $ses_index = 12;
          }
        }
    }

    if($u_type=='Others'){
      $locatn   = $_POST['location'];
          if($locatn=='Select one'){
            $loc_index = 0;
          }else if($locatn=='Ambottola'){
            $loc_index = 4;
          }else if($locatn=='Arabpur'){
            $loc_index = 5;
          }else if($locatn=='Chachra'){
            $loc_index = 6;
          }else if($locatn=='Chowgacha'){
            $loc_index = 7;
          }else if($locatn=='Curamonkhati'){
            $loc_index = 8;
          }else if($locatn=='Dhormotola'){
            $loc_index = 9;
          }else if($locatn=='Doratana'){
            $loc_index = 10;
          }else if($locatn=='Kathaltola'){
            $loc_index = 11;
          }else if($locatn=='Monihar'){
            $loc_index = 12;
          }else if($locatn=='NewMarket'){
            $loc_index = 13;
          }else if($locatn=='Palbari'){
            $loc_index = 14;
          }else if($locatn=='RailStation'){
            $loc_index = 15;
          }

          echo 'location index: '.$loc_index.'<br>';
    }
//...................................................


    $p        = $_POST['phonenumber'];
    //$b        = $_POST['birthday']; 
    $e        = $_POST['email'];
    $pass     = $_POST['password'];
    $con_pass = $_POST['confirmpassword'];
    $last_date = $_POST['lastdonationdate'];
     
  
   

    $userReg = $user->userRegistration($_POST); 

  }

?>



  <!--...........................................................................................................--> 
<section id="registration_section">
<div class="container">
    <div class="row">
        <div class="col">

            <h2 class="title"><i class="px-2 fa fa-hand-o-down" aria-hidden="true"></i><span id="regHeading">Registration</span> </h2>
            <p class="sub_title mt-0">Please fill up all information carefully</p> 
            <?php 
                        if($userReg){
                          echo $userReg;
                          //echo "<script type='text/javascript>alert('$userReg')</script>" ;                   
                        }
                      ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
          <div class="shadow_box">
            <form action='' method='post'>
                <div class="row">
                    <div class="col">
                      <div class="user_type_box">
                        <label for="userType">Select user type</label>
                        <select onclick="getUserTypeValue()" name="usertype" id="usertype" class="form-control">
                          <option  value="Teacher">Teacher</option> 
                          <option  value="Student" selected>Student</option>  
                          <option  value="Others" >Others</option>  
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-sm-6">
                      
                        <div class="form-group">
                            <label for="username">Your name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Type your name" value="<?php echo $n?>" >

                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="bloodgroup">Select blood group </label>
                
                    <select id="bloodgroup" name="bloodgroup" class="form-control" >
                      <option value="Select one" selected>Select one</option>
                      <option value="A+" >A+</option>
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
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                <label for="usernumber">Phone</label>
                <input id="phonenumber" type="number" name="phonenumber" class="form-control" placeholder="Type your phone no" value="<?php echo  $p?>">
                
              </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="location">Select location</label>
                <div class="test_height">
                  <select id="location" name="location" class="form-control" size="1" onfocus='this.size=5;'      onblur='this.size=1;' onchange='this.size=1; this.blur();'> 

                    <option value="Select one" selected>Select one</option>                          
                    <option id="dormetory_id" value="DORMETORY, JUST">Dormetory,JUST</option>
                    <option id="smr_hall_id" value="SMRH, JUST">Shahid Mosiur Rahman Hall,JUST</option>
                    <option id="shh_hall_id" value="SHH, JUST">Sheikh Hasina Hall,JUST</option>
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
                <!--session and department section-->

                <div class="row">
                  <div class="col-sm-6">
                    <div id="departmentDiv_id" class="form-group">
                      <label for="department">Select department</label>
                    <div class="test_height"> 

                      <select id="department_id" name="department" class="form-control" size="1" onfocus='this.size=5;'       onblur='this.size=1;' onchange='this.size=1; this.blur();'>  

                        <option value="Select one" selected>Select one</option>
                        
                        <option  value="CSE">CSE</option>
                        <option  value="EEE">EEE</option>
                        <option  value="CHE" >CHE</option>
                        <option  value="IP">IP</option>
                        <option  value="PME" >PME</option>
                        <option  value="Textile">Textile</option> 
                        <option  value="BME">BME</option> 

                        <option  value="EST">EST</option>
                        <option  value="NFT">NFT</option> 
                        <option  value="APPT">APPT</option> 
                        <option  value="CDM">CDM</option>  

                        <option  value="FMB" >FMB</option>
                        <option  value="Pharmacy" >Pharmacy</option>
                        <option  value="GBT">GBT</option>  
                        <option  value="Microbiology" >Microbiology</option>

                        <option  value="PESS">PESS</option>
                        <option  value="Nursing">Nursing</option> 
                        <option  value="Physiotherapy">Physiotherapy</option>  

                        <option  value="Physics">Physics</option>
                        <option  value="Chemistry">Chemistry</option>
                        <option  value="Mathematics">Mathematics</option>
                        <option  value="English">English</option>

                        <option  value="AIS">AIS</option>
                        <option  value="Management"> Management</option>
                        <option  value="Finance and Banking"> Finance and Banking</option>
                        <option  value="Marketing"> Marketing</option> 

                        </select>  
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div id="sessionDiv_id" class="form-group">
                <label for="session">Select session</label>
              <div class="test_height">
                <select id="session_id" name="session" class="form-control" size="1" onfocus='this.size=5;'      onblur='this.size=1;' onchange='this.size=1; this.blur();'> 
                  
                  <option id="warning" value="Select one" selected>Select one </option>
                  <option id="eight_nine" value="2008-2009" >2008-2009</option>
                  <option id="nine_ten" value="2009-2010" >2009-2010</option>
                  <option id="ten_eleven" value="2010-2011" >2010-2011</option>
                  <option id="eleven_twelve" value="2011-2012" >2011-2012</option>
                  <option id="twelve_thirteen" value="2012-2013" >2012-2013</option>
                  <option id="thirteen_fourteen" value="2013-2014" >2013-2014</option>
                  <option id="fourteen_fifteen" value="2014-2015" >2014-2015</option>
                  <option id="fifteen_sixteen" value="2015-2016" >2015-2016</option>
                  <option id="sixteen_seventeen" value="2016-2017" >2016-2017</option>
                  <option id="seventeen_eighteen" value="2017-2018" >2017-2018</option>
                  <option id="eighteen_nineteen" value="2018-2019" >2018-2019</option>
                  <option id="nineteen_twenty" value="2019-2020" >2019-2020</option>
                   
                  </select>
              </div>
            </div>
            <div id="designationDiv_id" class="form-group">   
                <label for="designation">Select Designation</label>
              <div class="test_height">
                <select id="designation" name="designation" class="form-control" size="1" onfocus='this.size=4;'      onblur='this.size=1;' onchange='this.size=1; this.blur();'> 
                <option value="Select one" selected>Select one</option>
                  <option value="Professor" >Professor</option>
                  <option value="Associate professor" >Associate professor</option>
                  <option value="Assistant professor" >Assistant professor</option>
                  <option value="Lecturare" >Lecturare</option>
                   
                  </select>
              </div>
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
                  <input id="email" type="email" name="email" class="form-control"  placeholder="Type email" value="<?php echo $e?>">
              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="user_paswwrord">Password</label>
                  <input id="password" type="password" name="password" class="form-control"  placeholder="Type password" value="<?php echo  $pass?>">
              </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label for="user_paswwrord">Confirm password</label>
                  <input id="confrimpassword" type="password" name="confirmpassword" class="form-control"  placeholder="Confirm password" value="<?php echo  $con_pass?>">
              </div>
                    </div>
                </div>
                <!--...............................................................................................-->
                <!-- <div class="row d-none">
                  <div class="col-12">
                    <div class="form-group birth_day_box">
                      <label for="birthday">Date of Birth</label><br>
                      <small>if you forgot your password, you can update your password by this birthdate</small>
                      <input id="birthdate_id" name="birthday" class="form-control" type="date" data-date="" data-date-format="DD MMMM YYYY"> 
                    </div>
                  </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                    <div class="form-group last_date_box">
                        <label for="lastdonationdate" class="font-weight-bold">Did you remember last blood donation date? </label> <br>
                        <input onclick="hideFunction()" type="radio" value="no" name="lastDateReminder" checked> <span class="font-weight-bold">No</span>
                        <input onclick="showFunction()" id="yesId" type="radio" value="yes" name="lastDateReminder"> <span class="font-weight-bold">Yes</span>
                        <label id="date_format" for="dateInput">Month-Day-Year</label> 
                        <input id="dateInput" name="lastdonationdate" class="form-control" type="date" value="<?php echo $last_date?>"> 
                    </div>
                    <!-- <small class="text-center d-block">if you forgot your password, you can update your password by this birthdate</small> -->
                    </div> 
                </div>
                <!--...............................................................................................-->

                <div class="row">
                    <div class="col-sm-6 text-center">
                    <input onclick="checkValidataion()" type="submit" name="registration" value="Click to Submit" class ="btn btn-primary mb-2">
                    </div>
                    <div class="col-sm-6 text-center ">
                    <input onclick="clearAllValue()" id="reset" type="reset" value="Click to Reset" class ="btn btn-danger "> 
                    </div>
                </div>
            </form>
            </div> <!--shadow box-->
        </div>
    </div>
</div>
</section>


<!--FOOTER SECTION-->


<?php 
  include_once "inc/footer.php";

?>

<script>

              function myFunction(){}
              window.scrollTo(0,286);

                  document.getElementById('dormetory_id').style.display='none';
                  document.getElementById('smr_hall_id').style.display='block';
                  document.getElementById('shh_hall_id').style.display='block';

                  document.getElementById('departmentDiv_id').style.display='block';
                  document.getElementById('sessionDiv_id').style.display='block';
                  document.getElementById('designationDiv_id').style.display='none';

              // get user type
              let userTypeIndex = document.getElementById("usertype").value; 
                    
              document.getElementById('regHeading').innerHTML="Registration for "+userTypeIndex;
              document.getElementById('designationDiv_id').style.display='none';
 </script>

<script>

                function getUserTypeValue()
                {
                  let getClickIndex = document.getElementById('usertype').value;
                  document.getElementById('regHeading').innerHTML="Registration for "+getClickIndex; 
                  
                  if(getClickIndex=='Teacher'){
                    document.getElementById('dormetory_id').style.display='block';
                    document.getElementById('smr_hall_id').style.display='none';
                    document.getElementById('shh_hall_id').style.display='none';

                    document.getElementById('departmentDiv_id').style.display='block';
                    document.getElementById('sessionDiv_id').style.display='none';
                    document.getElementById('designationDiv_id').style.display='block';
                  }
                  if(getClickIndex=='Student'){
                    document.getElementById('dormetory_id').style.display='none';
                    document.getElementById('smr_hall_id').style.display='block';
                    document.getElementById('shh_hall_id').style.display='block';

                    document.getElementById('departmentDiv_id').style.display='block';
                    document.getElementById('sessionDiv_id').style.display='block';
                    document.getElementById('designationDiv_id').style.display='none';
                  }
                  if(getClickIndex=='Others'){
                    document.getElementById('dormetory_id').style.display='none';
                    document.getElementById('smr_hall_id').style.display='none';
                    document.getElementById('shh_hall_id').style.display='none';

                    document.getElementById('departmentDiv_id').style.display='none';
                    document.getElementById('sessionDiv_id').style.display='none';
                    document.getElementById('designationDiv_id').style.display='none';
                  }
                }

                // disable select option field..............................................



                function myFunction() {
                  setInterval(function(){

                    getUserTypeValue();

                    let userDepartment = document.getElementById("department_id").value;

                    if(userDepartment=='Select one'){
                      document.getElementById("session_id").disabled = true;
                    // document.getElementById("session_id").value = 'blank';
                      document.getElementById("warning").innerHTML = "First Select Department";
                    }else{
                      document.getElementById("session_id").disabled = false;
                      document.getElementById("warning").innerHTML = "Select one";

                      if(userDepartment=='CSE' || userDepartment=='NFT' || userDepartment=='EST' || userDepartment=='FMB'){ 

                          document.getElementById('eight_nine').style.display='block'; 
                          document.getElementById('nine_ten').style.display='block'; 
                          document.getElementById('ten_eleven').style.display='block'; 
                          document.getElementById('eleven_twelve').style.display='block'; 
                          document.getElementById('twelve_thirteen').style.display='block'; 
                          document.getElementById('thirteen_fourteen').style.display='block'; 
                          document.getElementById('fourteen_fifteen').style.display='block';      
                          document.getElementById('fifteen_sixteen').style.display='block'; 
                          document.getElementById('sixteen_seventeen').style.display='block'; 
                          document.getElementById('seventeen_eighteen').style.display='block';    
                          document.getElementById('eighteen_nineteen').style.display='block'; 
                          document.getElementById('nineteen_twenty').style.display='block';                                              

                    }
                    if(userDepartment=='BME'){  

                          document.getElementById('session_id').disabled = false;

                          document.getElementById('eight_nine').style.display='none';
                          document.getElementById('nine_ten').style.display='none';
                          document.getElementById('ten_eleven').style.display='none';
                          document.getElementById('eleven_twelve').style.display='none';
                          document.getElementById('twelve_thirteen').style.display='none';
                          document.getElementById('thirteen_fourteen').style.display='none';
                          document.getElementById('fourteen_fifteen').style.display='none';                           

                        }
                    }
                    }, 100);
                }

                function clearAllValue()
                {
                  let nm =  document.getElementById('name').value='';
                  console.log(nm); 
                }

                function hideFunction(){
                  document.getElementById('dateInput').value='';

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

<script>

              var tuser = '<?php echo $u_type_index?>';
              document.getElementById("usertype").selectedIndex = tuser; 
              
              var tBlood = '<?php echo $blood_index?>';
              document.getElementById("bloodgroup").selectedIndex = tBlood; 

              
              var tLocation = '<?php echo $loc_index?>';
              document.getElementById("location").selectedIndex = tLocation; 

              var tDepartment = '<?php echo $dep_index?>';
              document.getElementById("department_id").selectedIndex = tDepartment; 

              var tSession = '<?php echo $ses_index?>';
              document.getElementById("session_id").selectedIndex = tSession;

              var tDesignation = '<?php echo $desig_index?>';
              document.getElementById("designation").selectedIndex = tDesignation; 

              

</script>








<script src="js/jquery.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js" ></script>

<script src="js/main.js" type="module"></script>

</body>
</html>



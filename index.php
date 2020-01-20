
<?php 
                         
  $allDonor='';                                                                                                                                                                  
  include_once 'inc/header.php'; 
  $user = new User();                            

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['searchdonor'])){ 

    Session::setBloodGroup('searchDonorBloodGroup',$_POST['bloodgroup']);
    Session::setLocation('searchDonorLocation',$_POST['location']);

    header('Location:searchResult.php'); 

  }
  $allDonor=$user->allDonor();

?>

  <!--...........................................................................................................-->

  <!--Second Section-->
   <section id="Second_section"> 
      <div class="container">
        <div class="row">
          <div class="col-12"> 
              <div class="round">
                  <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>
                  <p>Donor</p>
                  <span class="counter"><?php echo $allDonor?></span> 
                 </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
              <div class="emmergency_search_box"> 
                
                  <h2 class="text-center typing"></h2>
                  <img src="img/mobile_art.svg" alt="not found"> 
                   <div class="emmergency_search_box_content text-center">
                      <div>
                      <form action="" method="POST">                                                                
                        <div class="row">
                          <div class="col-6">
                            <div class="blood_box">
                                <span><i class="fa fa-tint" aria-hidden="true"></i></span> 
                                <label for="searchBloodGroup">Select Blood Group</label> 
                            </div> 
                          </div>
                          <div class="col-6">
                              <select name="bloodgroup" class="form-control" size="1"> 
                                  <option value="A+" selected>A+</option>              
                                  <option value="AB+">AB+</option>                                    
                                  <option value="A-">A-</option>                                                    
                                  <option value="AB-">AB-</option>                                                             
                                  <option value="O+">O+</option>                                                                  
                                  <option value="O-">O-</option>                                                             
                                  <option value="B+">B+</option>                                                                
                                  <option value="B-">B-</option>                                              
                                </select>
                          </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                              <div class="city_box">
                                  <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                  <label>Your Current Location</label> 
                              </div>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <select name="location" class="form-control" size="1" onfocus='this.size=5;'      onblur='this.size=1;' onchange='this.size=1; this.blur();'> 
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
                        <input  type="submit" name="searchdonor" value="Click to search donor" class="btn  mt-3">
                   </div>
                   <div class="emmergency_search_box_footer"> 
                   </div>
                </div>
          </div>
        </div>
      </div>
      <i onclick="go_to_top()" id="fixedIcon" class="fixed_icon fa fa-arrow-up"></i>
    </section>

     <!--Third Section-->
  <section id="Third_section">
      <div class="container">
        <div class="row">
          <div class="col">

            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="abc text-center">
              <div class="ic">
                  
                  <i class="fa fa-mobile" aria-hidden="true"></i>
              </div>
                
              <h3 class="emr_title">Emmergency Phone Number </h3>
              <div class="test">
                  <div class="d-flex flex-row ">
                      <div class=" align-self-start">
                        <span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                      </div>
                      <div class=" align-self-end">
                        <p >01234567891  (Ambulance,JUST) </p> 
                      </div>
                    </div>
                    <div class="d-flex flex-row ">
                        <div class=" align-self-start ">
                          <span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                        </div>
                        <div class=" align-self-end">
                            <p >01234567891 (Medical,JUST) </p>  
                        </div>
                      </div>
                      <div class="d-flex flex-row ">
                          <div class="  align-self-start ">
                            <span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                          </div>
                          <div class=" align-self-end">
                              <p >01234567891 (Blood Bank Club,JUST) </p>  
                          </div>
                        </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="custom_main_box text-center">
              <img id="test" src="img/jbb_circle.svg" alt="Blood ">
              <!-- <i class="fa fa-tint tint" aria-hidden="true"></i> -->
                <p class="lead">
                    "A person safely donate one unit of blood, that is, 350 ml once every 3 months."
                </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    


  <!--................................................................................................................-->
  


    <!--................................................................................................................-->
  
 


  <section id="Four_section">
      <div class="container">
        
        <div class="row">
          <div class="col-12">
            <h2 class="title  py-3"><i class="fa fa-pie-chart " aria-hidden="true"></i> Parcentage of Blood Group</h2>
            <p class="sub_title">Here, we know about the Percentage of each blood group and status(common/rare/very rare)</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="blood_group_descrioption">
              <div class="card">
               
                <div class="blood_info">
                  <h4 class="text-center">O +</h4>
                  <p >
                    O+ is the most frequently occurring blood type and is found in 37 percent of the population.
                  </p>
                  <p class="percent"><strong>Percentage :</strong> <span class="counter"> 37 </span> %</p> 
                  <p class="status"><strong>Status :</strong> Common</p>
                   
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="blood_group_descrioption">
                <div class="card">
                
                  <div class="blood_info">
                    <h4 class="text-center">A +</h4>
                    <p >
                      A+ is the second most common blood type and is found in 34 percent of the population.
                    </p>
                    <p class="percent"><strong>Percentage :</strong> <span class="counter"> 34 </span> %</p>
                    <p class="status"><strong>Status :</strong> Common</p>
                     
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="blood_group_descrioption">
                  <div class="card">
                   
                    <div class="blood_info">
                      <h4 class="text-center">B +</h4>
                      <p >
                        B positive is an important blood type for treating people with sickle cell disease and thalassemia.
                      </p>
                      <p class="percent"><strong>Percentage :</strong> <span class="counter"> 10 </span> %</p>
                      <p class="status"><strong>Status :</strong> Common</p>
                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="blood_group_descrioption">
                    <div class="card">
                     
                      <div class="blood_info">
                        <h4 class="text-center">AB +</h4>
                        <p >
                          AB+ is a rare blood group in the world and is found in 4 percent of the population.
                        </p>
                        <span class="mtTop">
                          <p class="percent"><strong>Percentage :</strong> <span class="counter"> 4 </span> %</p>
                          <p class="status"><strong>Status :</strong> very rare</p>
                        </span>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <!--second row-->
        <div class="row ">
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="blood_group_descrioption">
                <div class="card">
                  
                  <div class="blood_info">
                    <h4 class="text-center">O -</h4>
                    <p >
                      O negative is the universal blood type. O negative blood type can only receive O negative blood
                    </p>
                    <p class="percent"><strong>Percentage :</strong> <span class="counter"> 6 </span> %</p>
                    <p class="status"><strong>Status :</strong> rare</p>
                
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="blood_group_descrioption">
                  <div class="card">
             
                    <div class="blood_info">
                      
                      <h4 class="text-center">A -</h4>
                      <p >
                        A- blood is typically transfused quickly because of the community’s need.
                       
                      </p>
                      <span class="mtTop">
                        <p class="percent"><strong>Percentage :</strong> <span class="counter"> 6 </span> %</p>
                        <p class="status"><strong>Status :</strong> rare</p>
                      </span>
                      
               
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="blood_group_descrioption">
                    <div class="card">
                      <div class="blood_info">
                        <h4 class="text-center">B -</h4>
                        <p >
                          Less than 2% of the population have B negative blood. B negative is very rare blood group.
                        </p>
                        <p class="percent"><strong>Percentage :</strong> <span class="counter"> 2 </span> %</p>
                        <p class="status"><strong>Status :</strong> very rare</p> 
      
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="blood_group_descrioption">
                      <div class="card">
                        <div class="blood_info">
                          
                          <h4 class="text-center">AB -</h4>
                          <p >
                            B- only found in 1 of every 100 people, making it the rarest blood type there
                              is.
                          </p>
                          <span class="mtTop">
                            <p class="percent"><strong>Percentage :</strong> <span class="counter"> 1 </span> %</p>
                            <p class="status"><strong>Status :</strong> very rare</p>
                          </span>
                           
                   
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
      </div>
       
    </section>
 

<!--................................................................................................................-->
  
 
  <!--Fifth Section-->
  <section id="Fifth_section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="head_box">
                <h2 class="title py-3"><i class="px-2 fa fa-question-circle" aria-hidden="true"></i>Facts About Blood Donation</h2>
                <p class="sub_title">Here, we know about the facts, Knowledge, Misconceptions and Motivations Towards Blood donation</p> 
                <!-- <img src="img/question.svg" alt=""> -->
            </div>
              
          </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="business_card">
                  <div class="d-flex flex-row">
                    <div class="p-4 align-self-center mt-2">
                      <span><i class="fa fa-question" aria-hidden="true"></i></span>
                    </div>
                    <div class="p-4 align-self-end">
                        <h5 class="pt-3 py-2"><strong>Q: </strong>Is blood donation safe?</h5>
                        <p>
                            <strong>Ans: </strong>Yes, blood donation is considered very safe. 
                        </p>
                        <h5 class="pt-3 py-2"><strong>Q: </strong> what age can i donate blood?</h5>
                        <p>
                            <strong>Ans: </strong>You must be at least 17 years old to donate blood.
                        </p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                  <div class="business_card">
                    <div class="d-flex flex-row">
                      <div class="p-4 align-self-center mt-2">
                        <span><i class="fa fa-question" aria-hidden="true"></i></i></span>
                      </div>
                      <div class="p-4 align-self-end">
                          <h5 class="pt-3 py-2"><strong>Q: </strong> How often/regularly can I donate blood?</h5>
                          <p>
                              <strong>Ans: </strong>Every 4 month.
                          </p>
                          <h5 class="pt-3 py-2"><strong>Q: </strong> Which blood group is known as the 'universal donor'?
                          </h5>
                          <p>
                              <strong>Ans: </strong>O-
                          </p>
                        </div>
                    </div>
                  </div>
                </div>
        </div>
        <div class="row text-center">
          <div class="col">
            <a href="fact.php" target="_blank" class="btn">Click to More info </a>
          </div>
        </div>
        
          <!--new row-->
        
          <!--new row-->
       
      </div>
       
    </section>



<section id="Six_section">
  <div class="container">
  <div class="row">
    <div class="col-12">
        <h2 class="title  py-3"><i class="px-2 fa fa-list-alt" aria-hidden="true"></i>Talks About Our Site</h2>
        <p class="sub_title">Lets talk about our site,information and instruction</p>
          <!-- <img src="img/clipboards.svg" alt=""> -->
      
    </div>
  </div>
  <div class="our_instruction">
  <div class="row">
    <div class="col">
      
          <ul>
            <li>
              <p class="lead">
                <i class="fa fa-arrow-circle-up p-1 m-1" aria-hidden="true"></i>  
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, ea. Temporibus reprehenderit dolorem  
              </p>
           </li>
           
           <li>
              <p class="lead">
                <i class="fa fa-arrow-circle-up p-1 m-1" aria-hidden="true"></i> 
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, sapiente! Lorem ipsum dolor sit amet 
              </p>
           </li>
           <li>
            <p class="lead">
              <i class="fa fa-arrow-circle-up p-1 m-1" aria-hidden="true"></i> 
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, ea. Temporibus reprehenderit dolorem  
            </p>
         </li>
          </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="our_tips">
        <span><i class="fa fa-tint"></i></span>
        <p class="lead">
          Be donor and donate blood.
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="our_tips">
        <span><i class="fa fa-usd"></i></span>
        <p class="lead">
          Our service is totally free for all.
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="our_tips">
        <span><i class="fa fa-shield"></i></span>
        <p class="lead">
          We keep your information safe & secure. 
        </p>
      </div>
    </div>
  </div>
</div>
</div>
</section>


<section id="Seven_section"> 
  <div class="container">
      <div class="row down">
          <div class="col-12">
              <h2 class="title  py-3"><i class="px-2 fa fa-commenting" aria-hidden="true"></i>Feedback About Our Service</h2>
              <p class="sub_title">Here you can send us your feedback. Give us information about blood donation and help us with your valuable instruction.</p>                          
                <!-- <img src="img/clipboards.svg" alt=""> -->      
                                
          </div>
        </div>
    <div class="row">
      <div class="col-md-5">
        <div class="feed_back_text">
            <h2>You can send us your feedback</h2>
            <p class="mt-4  mb-lg-8">Here you can send us your feedback. Give us information about blood donation and help us with your valuable instruction.</p>
        </div>
      </div>
      <div class="col-md-7">
      
          <div class="mobile_box">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" placeholder="Type your email" class="form-control my-3">
                </div>
                <div class="form-group">
                  <label>Message</label>
                </div>
                <textarea  class="form-control my-3" placeholder="Type your message"></textarea>
                <input type="submit" value="Send feedback" class="btn btn-primary">
            </form>
          </div>
       
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
// fixed button icon....................................................................

window.onscroll=function(){showFixedIcon()};

function showFixedIcon()
{

  if(document.body.scrollTo>200 || document.documentElement.scrollTop>200){
    document.getElementById("fixedIcon").style.transition='.5s';
    document.getElementById("fixedIcon").style.opacity='.9';
  }else{
    document.getElementById("fixedIcon").style.opacity='0';
  }

  if(document.body.scrollTo>140 || document.documentElement.scrollTop>140){

    document.getElementById("test").style.right="500px";
    document.getElementById("test").style.transition='1s';
   }else{
    document.getElementById("test").style.right="-1000px";
    document.getElementById("test").style.transition='2s';
   }

   //console.log(document.documentElement.scrollTop);

}
function go_to_top()
{
  document.body.scrollTop=0;
  document.documentElement.scrollTop=0;
}


// typing effect......................................................................
const texts = ['Emmergency Blood Search zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz'] ;
     
let count = 0;
  let currentText = '';
  let index = 0;
  let letter = ''; 
 
  (function type(){                                  

    if(count===texts.length){
      count = 0;  
    }
    currentText = texts[count];
    letter = currentText.slice(0,++index);                            

    if(letter.includes('z')){
    }
    else{                        
      document.querySelector('.typing').textContent = letter; 
    }
    if(letter.length==currentText.length ){ 
      count++;
      index=0;

      let i=-1;
      let len = letter.length; 
      let str = letter.replace('zzzzzzzzzzzzzzz','');   
    }
    setTimeout(type,100);   
  }())
    // donor counter..................................................................
      setTimeout(function()
     { 
       let element =  document.getElementsByClassName('round'); 
       element[0].style.opacity='1'
       element[0].style.transition='.5s'
       element[0].style.right='10%'
     }, 1000); 


</script>

<!--Link-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/main.js"></script>


<!--counter link-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    });
</script>

<!--*****************************************************-->


<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>


</script>
</body>
</html>

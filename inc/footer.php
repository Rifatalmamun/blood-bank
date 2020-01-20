<footer id="footer_section" class="text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-4"> 
        <ul class="list-unstyled">
          <li><a href="index.html">Home</a></li>
          <li><a href="bloodbank.html">Blood Bank</a></li>
          <li><a href="ambulance.html">Ambulance</a></li>
          <li><a href="fact.html">Facts</a></li> 
        </ul> 
      </div>
      <div class="col-md-8 con">
          <h5>Connect us with facebook</h5>
          <p>Blood Bank Just Group: <a href="#">http//:www.facebook.com/bloodbankjust</a></p> 
        </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-4 contributor hide_contributor_for_sm">
          <h4>Contributor</h4>
          <h5>Md. Hafiz Bin Amin Tareq</h5>
          <p>Department: Computer Science and Engineering</p>
          <p><i class="fa fa-envelope-o" aria-hidden="true"></i> hafiztareqcse@gmail.com</p>
          <a href="#"><i class="text-light fa fa-facebook-square"></i></a>
          <a href="#" class="px-3"><i class="text-light fa fa-linkedin-square"></i></a>
          <a href="#"><i class="text-light fa fa-github"></i></a>                
      </div>

      <div class="col-md-4 developer">
          <h4>Design & Developed By </h4>
          <h5>Rifat al mamun</h5>
          <p>Department: Computer Science and Engineering</p>
          <p><i class="fa fa-envelope-o " aria-hidden="true"></i> rifatalmamun.cse@gmail.com</p> 
          <a href="https://www.facebook.com/Rifat.Cse15" target="_blank"><i class="text-light fa fa-facebook-square"></i></a>
          <a href="https://www.linkedin.com/in/rifat-al-mamun-47a145169/" class="px-3" target="_blank"><i class="text-light fa fa-linkedin-square"></i></a>
          <a href="https://github.com/Rifatalmamun" target="_blank"><i class="text-light fa fa-github"></i></a>  
        </div>
      <div class="col-md-4 contributor"> 
          <h4>Contributor</h4>
          <h5>Azaharul islam asik</h5>
          <p>Department: Computer Science and Engineering</p>
          <p><i class="fa fa-envelope-o" aria-hidden="true"></i> azaharul.csejust@gmail.com</p>
          <a href="#"><i class="text-light fa fa-facebook-square"></i></a>
          <a href="#" class="px-3"><i class="text-light fa fa-linkedin-square"></i></a>
          <a href="#"><i class="text-light fa fa-github"></i></a>                                             
      </div>
      <div class="col-md-4 contributor hide_contributor_for_lg">
          <h4>Contributor</h4>
          <h5>Md. Hafiz Bin Amin Tareq</h5>
          <p>Department: Computer Science and Engineering</p>
          <p><i class="fa fa-envelope-o" aria-hidden="true"></i> hafiztareqcse@gmail.com</p>
          <a href="#"><i class="text-light fa fa-facebook-square"></i></a>
          <a href="#"><i class="px-3 text-light fa fa-linkedin-square"></i></a>
          <a href="#"><i class="text-light fa fa-github"></i></a>                
      </div>
    </div>

  </div>
</footer>



<script>
// add active class in specific nav bar.......................................................... 

  var currentLoc = <?php echo $page?>;                                              

  if(currentLoc=='1'){
  
    document.getElementById("home").classList.add("font-weight-bold");
  }
  else if(currentLoc=='2'){
    document.getElementById("bloodbank").classList.add("font-weight-bold");
  }  
  else if(currentLoc=='3'){
    document.getElementById("ambulance").classList.add("font-weight-bold");
  }
  else {
    document.getElementById("facts1").classList.add("font-weight-bold");
    document.getElementById("facts2").classList.add("font-weight-bold");
  }               

</script>


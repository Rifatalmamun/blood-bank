<?php 
    include 'database.php';
    include 'session.php';


    class User{
        private $db;

        function __construct(){
            $this->db = new Database(); 
        }
        
        // GET ALL DONOR FUNCTION........................................................

        public function allDonor(){
            $sql = "SELECT COUNT(id) FROM donor_table";
            $query=$this->db->pdo->prepare($sql);
            $result = $query->execute();

            $result = $query->fetchColumn(); // fetch the actual number of donor in database 
            
            return $result;                 
        }

        // DONOR REGISTRATION PROCESS.................................................... 

        public function userRegistration($data){
            $name                      = $this->validate($data['name']);
            $usertype                  = $data['usertype']; 
            $bloodGroup                = $_POST['bloodgroup'];
            $gender                    = $_POST['gender'];
            $phoneNumber               = $data['phonenumber'];
            $location                  = $_POST['location'];
            $department                = $_POST['department'];
            
            if(!isset($_POST['session'])){
               $session = 'blank';
            }else{
                $session               = $_POST['session'];
            }

            $designation               = $_POST['designation'];
            $email                     = $this->validate($data['email']);
            $password                  = $data['password'];
            $confrimPassword           = $data['confirmpassword']; 
            $lastDonationDate          = $data['lastdonationdate'];

            

            $isAvailableEmail=$this->isDuplicateEmail($email);
            $isAvailablePhone=$this->isDuplicatePhone($phoneNumber);
            $isValidDate=$this->isDonationDateValid($lastDonationDate); 

            if($isAvailableEmail==false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Email already registered!</div>";
                return $msg;
            }
            if($isAvailablePhone==false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Phone number already registered!</div>";
                return $msg;
            }
            if($isValidDate==false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Last donation date not valid!</div>";
                return $msg;
            }

            if(empty($name)){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Name field empty!</div>";
                return $msg;
            }
            if($bloodGroup=='Select one'){ 
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Please Select Blood Group!</div>";
                return $msg;
            }
            if(empty($phoneNumber)){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Phone number field empty!</div>";
                return $msg;
            }
            if(strlen($phoneNumber) !=11){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Phone number not valid!</div>";
                return $msg;
            }
            if($location=='Select one'){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Please select location!</div>";
            return $msg;
            }
            // if($dob=='0000-00-00'){ 
            //     $msg = "<div class='alert alert-danger'><strong>Error! </strong>Birthday field empty!</div>";
            //     return $msg;
            // }
            // if(empty($dob)){ 
            //     $msg = "<div class='alert alert-danger'><strong>Error! </strong>Birthday field empty!</div>";
            //     return $msg;
            // }
            if(empty($email)){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Email field empty!</div>";
                return $msg;
            }
            if(empty($password)){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Password field empty!</div>";
                return $msg;
            }
            if(empty($confrimPassword)){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Confrim password field empty!</div>";
                return $msg;
            }
            
            
            // for usertype Teacher................................... 
            if($usertype=='Teacher'){
                $session='blank';
                if($department=='Select one'){
                    $msg = "<div class='alert alert-danger'><strong>Error! </strong>Department field empty!</div>";
                return $msg;
                }
                if(empty($designation)){
                    $msg = "<div class='alert alert-danger'><strong>Error! </strong>Designation field empty!</div>";
                return $msg;
                }
            }
            // for usertype Student....................................
            if($usertype=='Student'){     
                $designation='blank';
                if($department=='Select one'){
                    $msg = "<div class='alert alert-danger'><strong>Error! </strong>Department field empty!</div>";
                return $msg;
                }
                if($session=='Select one' or $session=='First Select Department'){ 
                    $msg = "<div class='alert alert-danger'><strong>Error! </strong>Please Select session!</div>";
                return $msg; 
                }
                if(empty($session)){
                    $msg = "<div class='alert alert-danger'><strong>Error! </strong>Session field empty!</div>"; 
                    return $msg;  
                }
            }
            // for usertype others ...............................................  
            if($usertype=='Others'){
                $department = 'blank'; 
                $session='blank';
                $designation = 'blank';
            }


            if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){ 
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Email not valid!</div>"; 
                return $msg;
            }
            if($password!=$confrimPassword){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Password not match!</div>";
                return $msg;
            }

            // password md5 process.............. 
            $password=md5($password);
            $confrimPassword=md5($confrimPassword);
    
            $sql = "insert into donor_table (name,bloodgroup,phone,location,email,gender,password,lastdonationdate,usertype,department,session,designation) values(:name,:bloodgroup,:phone,:location,:email,:gender,:password,:lastdonationdate,:usertype,:department,:session,:designation)";
            $query=$this->db->pdo->prepare($sql);
            $query->bindValue(':name',$name);
            $query->bindValue(':bloodgroup',$bloodGroup);
            $query->bindValue(':phone',$phoneNumber);
            $query->bindValue(':location',$location);
            $query->bindValue(':email',$email);
            $query->bindValue(':gender',$gender);
            $query->bindValue(':password',$password);
            $query->bindValue(':usertype',$usertype);
            $query->bindValue(':department',$department);
            $query->bindValue(':session',$session);
            $query->bindValue(':designation',$designation);
            $query->bindValue(':lastdonationdate',$lastDonationDate);
            $result = $query->execute();

            if($result){
                $msg = "<div class='alert alert-success'><strong>Success! </strong>Registration complete!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Registration Failed!</div>";
                return $msg;
            }
        }






        // validate initial data ..................................
        function validate($data){
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);     
            
            return $data;
        }
        // duplicate email check function ........................... 
        public function isDuplicateEmail($email){
            $sql="select email from donor_table where email=:email"; 
            $query=$this->db->pdo->prepare($sql);
            $query->bindValue(':email',$email); 
            $query->execute();
    
            if($query->rowCount()>0){
                return false;
            }else{
                return true;
            }
        }
        // duplicate phone number check function ........................... 
        public function isDuplicatePhone($phone){
            $sql="select phone from donor_table where phone=:phone"; 
            $query=$this->db->pdo->prepare($sql);
            $query->bindValue(':phone',$phone); 
            $query->execute();

            if($query->rowCount()>0){
                return false;
            }else{
                return true;
            }
        }
        // is valid date function............................................ 
        public function isDonationDateValid($date)
        {
            //echo "Today is " . date("Y-m-d") . "<br>";
            $todaysDate = date("Y-m-d");

            $currentDay = date("d");
            $currentMonth = date("m");
            $currentYear  = date("Y");

            $donorDay   = substr($date,8, 2);  
            $donorMonth = substr($date,5, -3);  
            $donorYear  = substr($date,0, -6);  

            // echo 'current full date: '.date("Y-m-d");
            // echo '<br>';
            // echo 'donation full date: '.$date;
            // echo '<br>';
            // echo 'donation day: '.$donorDay;
            // echo '<br>';
            // echo 'donation month: '.$donorMonth;
            // echo '<br>';
            // echo 'donation year: '.$donorYear;

            if($donorYear>$currentYear) return false;
            else if($donorMonth>$currentMonth and $donorYear>=$currentYear ) return false;
            else if($donorDay>$currentDay and $donorMonth>=$currentMonth and $donorYear>=$currentYear) return false;
            else return true;

            //$donateDay = $data;
            
        }

        //  USER LOGN FUNCTION..................................................................... 
        function userLogin($data){
            $loginEmail = $data['email'];
            $loginPassword = $data['password'];

            $isAvailableEmail=$this->isDuplicateEmail($loginEmail);  

            if(empty($loginEmail) or empty($loginPassword)){
                $msg = "<div class='alert alert-danger'><strong>Empty! </strong>Field must not be empty!</div>";
                return $msg; 
            }
            if(filter_var($loginEmail,FILTER_VALIDATE_EMAIL)==false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Email not valid!</div>";
                return $msg;
            }

            $loginPassword=md5($loginPassword);
            
            $result = $this->getLoginUser($loginEmail,$loginPassword);

            if($result){
                Session::init();
                Session::set('login',true);
                Session::set('id',$result->id);
                Session::set('name',$result->name);
                Session::set('password',$result->password);
                Session::set('loginmsg',"Successfully login");
                header('Location: index.php');
            }else{
               
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Your data not found</div>";
                return $msg;
                
            }



        }
        // getLoginUser function ................................................................ 
        function getLoginUser($email,$password){
        $sql = "SELECT * FROM donor_table WHERE email= :email AND password= :password LIMIT 1";
        $query=$this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $query->execute();

        $result=$query->fetch(PDO::FETCH_OBJ); 
        return $result;
      }

      // get user data by id function............................................................... 
      function getUserDataById($id){
        $sql = "SELECT * FROM donor_table WHERE id =:id Limit 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id',$id);
        $query->execute();

        $result=$query->fetch(PDO::FETCH_OBJ);
        return $result;
      }

      // update user data ........................................................................... 
      function updateUserData($userid,$data){
            $name              = $this->validate($data['name']);
            $bloodGroup        =$_POST['bloodgroup'];
            $phoneNumber       = $data['phonenumber'];
            $location          = $_POST['location'];
            $email             = $this->validate($data['email']);
            $gender            =$_POST['gender'];
            $lastDonationDate  = $data['lastdonationdate'];

            $isValidDate=$this->isDonationDateValid($lastDonationDate); 

            if($isValidDate==false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Last donation date not valid!</div>";
                return $msg;
            }

            if(empty($name) or empty($email) or empty($phoneNumber) ){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty!</div>";
                return $msg;
            }
            if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Email not valid!</div>";
                return $msg;
            }
        
            $sql="UPDATE donor_table SET
                                id=:id,
                                name=:name,
                                bloodgroup=:bloodgroup,
                                phone=:phone,
                                location=:location,
                                email=:email,
                                gender=:gender,
                                lastdonationdate=:lastdonationdate
                            WHERE id = :id";

       $query=$this->db->pdo->prepare($sql);
       
       $query->bindValue(':id',$userid);
	   $query->bindValue(':name',$name);
	   $query->bindValue(':bloodgroup',$bloodGroup);
       $query->bindValue(':phone',$phoneNumber);
       $query->bindValue(':location',$location);
       $query->bindValue(':email',$email);
       $query->bindValue(':gender',$gender);  
       $query->bindValue(':lastdonationdate',$lastDonationDate);

	   $result=$query->execute();

            if($result){
                $msg = "<div class='alert alert-success'><strong>Success! </strong>Update successfully!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Update Failed!</div>";
                return $msg;
            }
       }
       // UPDATE PASSWORD FUNCTION...................................................................... 
       function updataPassword($id,$data){

        $currentPass = $data['current_password'];
        $newPass     = $data['new_password'];
        $newPassAgain     = $data['new_password_again'];

        if(empty($newPass) or empty($newPassAgain) or empty($currentPass) ){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty!</div>";
            return $msg;
        }
        if(strlen($newPass)<6){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>password length must be grater than six</div>";
            return $msg;
        }
        if(strlen($newPassAgain)<6){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>password length must be grater than six</div>";
            return $msg;
        }
        if($newPass!=$newPassAgain){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>password not match !</div>";
            return $msg;
        }
        $currentPass=md5($currentPass);
        $chk_pass = $this->checkPass($id,$currentPass);

        if($chk_pass==false){
            $msg="<div class='alert alert-danger'><strong>Sorry ! </strong>Current password not exist! </div> ";
			return $msg; 
        }

        $newPass=md5($newPass);
        $newPassAgain=md5($newPassAgain); 

        $sql="UPDATE donor_table SET
	   							password=:password
	   							where id=:id";

	   $query=$this->db->pdo->prepare($sql);

	   $query->bindValue(':password',$newPass);
	   $query->bindValue(':id',$id);
	   $result=$query->execute();

       if($result){
        $msg="<div class='alert alert-success'><strong>Success ! </strong>Password updated Successfully! </div> ";
         return $msg; 
        }
        else{
            $msg="<div class='alert alert-danger'><strong>Sorry ! </strong>Password not updated! </div> ";
            return $msg; 
        }
       }
       
       function checkPass($id,$pass){

		$sql="SELECT password FROM donor_table WHERE id=:id AND password=:password"; 
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id); 
		$query->bindValue(':password',$pass); 
		$query->execute();

		if($query->rowCount()>0){
			return true;
		}else{
			return false;
		}
    }
    // GET CURRENT PASSWORD ................................................................. 
    function getCurrentPassword($id){

        $sql="SELECT password FROM donor_table WHERE id=:id";
        $query=$this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id); 
		$query->execute();

        $result=$query->fetch(PDO::FETCH_OBJ); 
        if($result)
            return $result;
     }
     
    // SEARCH DONOR DATA........................................................................ 
    function searchDonor($data){

        $bloodGroup = $data['bloodgroup'];
        $location   = $data['location']; 
        
        if(empty($bloodGroup) or empty($location)){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty!</div>"; 
            return $msg; 
        }

        $sql = "SELECT * FROM donor_table WHERE bloodgroup=:bloodgroup AND location=:location"; 
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':bloodgroup',$bloodGroup);
        $query->bindValue(':location',$location);
        $query->execute();

        $result = $query->fetchAll();
        return $result;
     }
     //SEARCH DONOR FROM INDEX PAGE ...................................................................... 
     function searchDonorFromIndex($bloodGroup,$location){

        $sql = "SELECT * FROM donor_table WHERE bloodgroup=:bloodgroup AND location=:location"; 
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':bloodgroup',$bloodGroup);
        $query->bindValue(':location',$location);
        $query->execute();

        $result = $query->fetchAll();                             
        return $result;
     }

     // PASSWORD RECOVERY FUNCTION............................................................................ 
      public function varifyRecoveryPassword($data)
      { 

 
            $bloodGroup        =$_POST['bloodgroup'];
            $phoneNumber       = $data['phonenumber'];
            $email             = $this->validate($data['email']);
         
            if(empty($email) or empty($phoneNumber) ){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty!</div>";
                return $msg;
            }
            if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Email not valid!</div>";
                return $msg;
            }
        
        $sql=" SELECT * FROM donor_table WHERE bloodgroup=:bloodgroup AND phone=:phone AND email=:email";

       $query=$this->db->pdo->prepare($sql);
       
	   $query->bindValue(':bloodgroup',$bloodGroup);
       $query->bindValue(':phone',$phoneNumber);
       $query->bindValue(':email',$email);    

	   $query->execute();

            if($query->rowCount()>0){
                Session::init();
                Session::set('recEmail',$email);
                //header('Location: recovery.php?recoEmail='.$email); 
                header('Location: recovery.php');
                return '';      
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error! </strong>Wrong Information!</div>";
                return $msg;
            }
      }

      public function recoveryPassword($email,$data)
      {
        $newPass     = $data['new_password'];
        $newPassAgain     = $data['new_password_again'];

        if(empty($newPass) or empty($newPassAgain) ){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty!</div>";
            return $msg;
        }
        if(strlen($newPass)<6){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>password length must be grater than six</div>";
            return $msg;
        }
        if(strlen($newPassAgain)<6){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>password length must be grater than six</div>";
            return $msg;
        }
        if($newPass!=$newPassAgain){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>password not match !</div>";
            return $msg;
        }
    
        $newPass=md5($newPass); 

        $sql="UPDATE donor_table SET
	   							password=:password
	   							where email=:email";

	   $query=$this->db->pdo->prepare($sql);

	   $query->bindValue(':password',$newPass);
	   $query->bindValue(':email',$email);
	   $result=$query->execute();

       if($result){
        $msg="<div class='alert alert-success'><strong>Success ! </strong>Password set Successfully! </div> ";
        //Session::destroy(); 
         return $msg; 
        }
        else{
            $msg="<div class='alert alert-danger'><strong>Sorry ! </strong>Password not recovery! </div> ";
            return $msg; 
        }
      }

    }

?>
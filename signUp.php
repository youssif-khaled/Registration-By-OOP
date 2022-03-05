<?php
   require_once "pdo.php";
  

class signup {
    public $firstName;
    public $secondName;
    public $password;
    public $email;
    use DB;
    
public function __construct($fname,$sname,$password,$email){
$this -> firstName = $fname;
$this -> secondName = $sname;
$this -> password = $password;
$this -> email = $email;
}
public function empty(){
    if(empty($this-> firstName)  || empty($this -> secondName) || empty($this -> password) || empty($this -> email) ){
    //    print_r("Fill the input please"."<br>");
       return false;
    }
    else {
        return true; 
      
    }
}

public function validEmail(){
    if (filter_var($this -> email, FILTER_VALIDATE_EMAIL)) {
        // echo("is a valid email address"."<br>");
      return true; 
      } else {
        // echo(" is not a valid email address"."<br>");
        return false; 
      }
}

public function insert(){
    $sql = "INSERT INTO users (Email,Password) VALUES (?,?)";
$stmt= $this->connect()->prepare($sql);
if($this->empty() == true)
{$stmt->execute([$this -> email,$this -> password]);}

}

public function validRegister(){
$query =$this->connect()->prepare("SELECT Email FROM users WHERE Email = ?");
$y =$query->execute([$_POST['email']]);
$z = $query->fetch();
if($z){
    return false;
}
return true;

    
}

// public function validPassword(){
//     $number = preg_match('@[0-9]@',$this -> password );
// $uppercase = preg_match('@[A-Z]@',$this -> password );
// $lowercase = preg_match('@[a-z]@',$this -> password );
// $specialChars = preg_match('@[^\w]@',$this -> password );
 
// if(strlen($this -> password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
//  echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character."."<br>";
//  return false;
// } else {
//  echo "Your password is strong."."<br>";
//  return true;
// }
// }

}

if(isset($_POST['signupSubmit'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
     $password= $_POST['password'];
    $email = $_POST['email'];
    $user = new signUp($firstName,$lastName,$password,$email);
    
   if($user ->empty() == true && $user ->validEmail() == true && $user->validRegister() == true ) //&& $user -> validPassword() == true)
   {
    $user ->insert();
    header("Location: form2.php"); 
   }
   else{
    header("Location: form1.php");   
   }
    
}



?>
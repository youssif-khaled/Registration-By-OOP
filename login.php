<?php
   require_once "signUp.php";
   require_once "pdo.php";
class login extends signup{
public $emailLog;
public $passwordLog;
use DB;
public function __construct($email, $password)
{
 $this -> emailLog = $email;
 $this -> passwordLog = $password;   
}
public function empty(){
    if(empty($this -> passwordLog) || empty($this -> emailLog) ){
       print_r("Fill the input please"."<br>");
       return false;
    }
    else {
        return true; 
      
    }
}
public function validEmail(){
    if (filter_var($this -> emailLog, FILTER_VALIDATE_EMAIL)) {
        echo("is a valid email address"."<br>");
      return true; 
      } else {
        echo(" is not a valid email address"."<br>");
        return false; 
      }
}
public function validLogin(){
    $query =$this->connect()->prepare("SELECT Email FROM users WHERE Email = ? AND  Password = ?");
$y =$query->execute([$_POST['emailLogin'],$_POST['passwordLogin']]);
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

if(isset($_POST['LogSubmit'])){
    $password= $_POST['passwordLogin'];
    $email = $_POST['emailLogin'];
    $user = new login($email, $password);
   if($user ->empty() == true && $user ->validEmail() == true && $user->validLogin() == false) //&& $user -> validPassword() == true)
   {
    header("Location: result.php"); 
    
   }
   else{
    header("Location: form2.php"); 
   }
}



?>
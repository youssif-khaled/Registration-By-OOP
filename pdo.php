<?php

trait DB{



public function connect()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "backend";
    
    try {
       $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
       
     return $conn;
    } catch(PDOException $e) {
      echo "error". "<br>" . $e->getMessage();
    }
    
   
}


}












?>
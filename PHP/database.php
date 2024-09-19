<?php  
$servername_db = "localhost";
$username_db = "root";
$password_db = "";
$name_db = "gymdb"; 

try{$conn = mysqli_connect($servername_db,
  $username_db,
  $password_db,
  $name_db); 

}
  catch(mysqli_sql_exception){
    echo"Could not connect";
  }
?>
<?php 
  include "database.php";
?>
<?php
$message = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $role = filter_input(INPUT_POST, "roleOption", FILTER_SANITIZE_SPECIAL_CHARS);

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $cpassword = filter_input(INPUT_POST, "cpassword", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($email)){
      $message = "Please enter a email";
    }else if(empty($username)){
      $message = "Please enter a username";
    }else if(empty($password)){
      $message = "Please enter a password";
    }else if($password != $cpassword){
    $message = "Password not match!";
    }else{
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $chash = password_hash($cpassword, PASSWORD_DEFAULT);
      $sql = "INSERT INTO signupdb (role,   email, username, password, cpassword) VALUES ('$role','$email','$username','$hash','$chash')";
      try{
        mysqli_query($conn,$sql);
        echo"<script>alert('Successfully Sign up');</script>";
        header("location: register.php");
      }
     catch(mysqli_sql_exception){
      $message = "The username is taken";
     }
    }
  }

  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <title>Dr. ACE Fitness Gym</title>
  <link rel="icon" href="assets/logs.png">
  <link rel="stylesheet" href="../CSS/signup.css" />
</head>
<body>

<div class="container">


  <div class="conts1">

    <div class="form-wrap">
      <form action="<?php htmlspecialchars(($_SERVER["PHP_SELF"]))?>" method="post">

      <div class="ttl-wrap">
          <p id="login-ttl">SIGN UP</p>
          <h3>Enter your account details below</h3>
        </div>

        <div class="inputs-wrap">
          
          <label for="email"> <ion-icon name="mail-outline"></ion-icon>Email</label>

          <input type="email" name="email" id="email" class="in" required>


          <label for="username"> <ion-icon name="person"></ion-icon> Username</label>

          <input type="text" name="username" id="username" class="in"  required>


          <label for="passw"><ion-icon name="lock-closed"></ion-icon> Password</label>

          <input type="password" name="password" id="passw"  class="in"  required>


          <label for="conPassw"><ion-icon name="checkmark-outline"></ion-icon> Confirm Password</label>

          <input type="password" name="cpassword"  id="conPassw" class="in"  required>


          <div> <input type="submit" name="submitbtn" value = "Submit" class="SU"></div>
         
          <div id="messageAlert">
            <p style="color:black; text-align: center;" class="errorMsg"><?php echo $message; ?></p>
          </div>
        </div>
       
      </form>
    </div>

  </div>

  <div class="conts2">
    <img src="../assets/logs.png" alt="" height="150">
  </div>

</div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../Javascript/message.js"></script>
</body>
</html>


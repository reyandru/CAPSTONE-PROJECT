<
>
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
  <link rel="stylesheet" href="../CSS/membership.css" />
</head>
<body>

<div class="container">


  <div class="conts1">

    <div class="form-wrap">
      <form action="membership.php" method="post">

      <div class="ttl-wrap">
        <p id="login-ttl">Membership</p>
        <h3>Enter customer rate</h3>
        </div>

        <div class="inputs-wrap">
          
        
      

        <div class="inputs-wrap">
          <h3>Monthly Rates</h3>
          <label for="">
            <input type="radio" name="payment" id="" class="inputCheck" value="1k"> 
            1MONTH - &#8369;1000
          </label>
          <label for="">  
            <input type="radio" name="payment" id="" class="inputCheck" value="2k">
            3MONTH - &#8369;2700
          </label>
          <label for="">
             <input type="radio" name="payment" id="" class="inputCheck" value="5k">
             6MONTH - &#8369;5200
            </label>
        
          <h3>Student Rate</h3>
          <label for="">
            <input type="radio" name="payment" id="" class="inputCheck" value="9h">
            1MONTH - &#8369;900
          </label>

        </div>
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


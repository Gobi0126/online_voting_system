<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript">
       function back(){
         window.location.href ="index.html";
       }
       function register() {
         window.location.href = "";
       }
       
     </script>
     <?php
        //  require 'index.php';
         $errmsg="";
         $name="";
         $email="";
         $regno="";
          $phoneno="";
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])) {
      $conn= mysqli_connect('localhost','root','Gobi@1234','voting') or die("Connection failed:" .mysqli_connect_error());
      if(isset($_POST['name']) && isset($_POST['regno']) && isset($_POST['email']) && isset($_POST['phoneno']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['gender']) ) 
      {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $regno=$_POST['regno'];
        $phoneno=$_POST['phoneno'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $gender=$_POST['gender'];
        $passwordregex="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/";
        $nameregex="/^[a-z A-Z]*$/";
        $checkQuery = "SELECT * FROM users WHERE regno = '$regno'";
        $emailQuery = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn,$emailQuery);
        $result = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($result) > 0) {
          $errmsg = "*Registration number already exists";
        }
        else if(mysqli_num_rows($res) > 0) {
          $errmsg = "*Email already exists!";
        }
        else if(!preg_match($nameregex, $name)){
            $errmsg="*Password should be in correct format";
        }
        else if($password!=$confirmpassword){
        $errmsg="*Password and confirm password are not same";
        }
        elseif (!preg_match($passwordregex, $password)) {
            $errmsg="*Password must contain Minimum eight and maximum 16 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
        }
        else {
          session_start();
          $otp = rand(1000, 9999);
          require 'PHPMailer-master/src/Exception.php';
          require 'PHPMailer-master/src/PHPMailer.php';
          require 'PHPMailer-master/src/SMTP.php';
      
          $mail = new PHPMailer\PHPMailer\PHPMailer();
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'gobiv.21cse@kongu.edu'; 
          $mail->Password = 'Gobi@1234'; 
          $mail->SMTPSecure = 'tls'; 
          $mail->Port = 587; 
          $mail->SMTPDebug = 2;
          $mail->setFrom('gobiv.21cse@kongu.edu', 'Gobi');
          $mail->addAddress($email, $name);
          $mail->Subject = 'Registration OTP';
          $mail->Body = 'Your OTP for registration is: ' . $otp;
      
          if ($mail->send()) {
              session_start();
              $_SESSION['registration_otp'] = $otp;
              $_SESSION['name'] = $name; 
              $_SESSION['email'] = $email; 
              $_SESSION['regno'] = $regno; 
              $_SESSION['phoneno'] = $phoneno; 
              $_SESSION['password'] = $password; 
              $_SESSION['gender'] = $gender;          
              header('Location: otp_verification.php');
          } else {
              $errmsg = "*Email sending failed: " . $mail->ErrorInfo;
          }
      }
      }
      else {
        $errmsg="*All fields are required";
      }
    }
      ?>
   </head>
  <link rel="stylesheet" href="css\resgistration.css">
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="registration.php"   method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input name="name" type="text" placeholder="Enter your name" value="<?php echo "$name"; ?>" required pattern="[a-z A-Z]*">
          </div>
          <div class="input-box">
            <span class="details">Reg No</span>
            <input type="text" placeholder="Enter your regno" name="regno" value="<?php echo "$regno"; ?>" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" value="<?php echo "$email"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phoneno" value="<?php echo "$phoneno"; ?>" pattern="[0-9]{10}" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="confirmpassword" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Register" name="submit" style="margin-left:85px;">
        </div>
        <span style="color:red"><?php echo $errmsg; ?></span>
      </form>
    </div>
  </div>
</body>
</html>

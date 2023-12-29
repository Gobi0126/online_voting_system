<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="..\css\profile.css"/>

<?php
$errmsg="";
$name="";
$email="";
$regno="";
$phoneno="";
$conn = mysqli_connect("localhost","root","Gobi@1234","voting");
if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 $id = $_SESSION['regno'];
 $query21="select * from users where regno = '$id' ";
 $a1= mysqli_query($conn,$query21);
 $row1=mysqli_fetch_assoc($a1);
 $name=$row1["name"];
 $regno = $row1["regno"];
 $email=$row1["email"];
 $phoneno = $row1["phoneno"];
?>
</head>
<body>
<?php include 'header.php';?>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="..\img\avatar.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <br>
      <p style=" color:black">Name : <?php echo "$name" ; ?> </p>
      <br>
      <p style="color:black">Roll Number : <?php echo "$regno" ; ?></p> 
      <br>
      <p style="color:black">Email : <?php echo "$email" ; ?></p> 
      <br>
      <p style=" color:black">Phone : <?php echo "$phoneno" ; ?></p> 
      <br>
    </div>
  </div>
</div>
</body>
</html>







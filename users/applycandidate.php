<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   </head>
   <script type="text/javascript">

     function goback() {
         window.location.href ="studentdashboard.php";
     }
     function status(){
         window.location.href ="status.php";
     }
   </script>

<?php
  $conn = mysqli_connect("localhost","root","Gobi@1234","voting");
  if(!$conn) {
      die("Connection failed: ". mysqli_connect_error());
  }
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
  $regno = $_SESSION['regno'];
  require_once('../dbConnect.php');
  $sql="SELECT * FROM users WHERE regno='$regno';";
  $query1=mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($query1);
  $name=$row['name'];
  $regno=$row['regno'];
  $errmsg="";
  $sucmsg="";
  // $result=mysqli_query($conn,"SELECT count($regno) as total from leave where regno='$regno' AND status='Pending';");
  // $data=mysqli_fetch_assoc($result);
  // $count= $data['total'];
 ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM candidates_request WHERE regno='$regno'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $count = mysqli_num_rows($result);

        if ($count >= 1) {
            echo '<script>alert("You already applied for a candidate")</script>';
          } 
          else {
            require_once('../dbConnect.php');
            $sql = "INSERT INTO `candidates_request`(`name`,`regno`,`status`) VALUES ('$name','$regno','Pending')";
            $query = mysqli_query($conn, $sql);
            
            if ($query) {
                $sucmsg = '*Entry successful';
            } else {
                $errmsg = "*Error occurred";
            }
        }
    } else {
        $errmsg = "*Error occurred while checking the database";
    }
}
?>

<body>
<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
<?php include 'header.php'; ?>
<div class="container-fluid">
    <div class="row" style="background: linear-gradient(to right, #a517ba,#5f1178 );" width="100%">
      <div class="col-md-12" style="background-image: linear-gradient(to right, #a517ba,#5f1178 ); color: white;">
        <h1 style="text-align: center; background-image: linear-gradient(to right, #a517ba,#5f1178 ); color: white;"> Become Candidate</h1>
        <p>Become a Candidate</p>
      </div>
      <div class="col-md-6" >
        <img src="../img/11.svg" style="height: 400px;" >
      </div>
      <div class="col-md-6" data-aos="fade-left">
        <h1 style="color: white; margin-top: 40px; margin-bottom: 40px;" class=" ">Apply</h1>
        <p style="color: white;" >
          If you want to become a candidate, then you click on the link below, then you will be redirected. In the second
           page, by filling that, you can request for a candidate. After that, the administrator will approve your request so you can become a candidate.
           </p>
           <div style="display:flex;">
           <form method="post" action="applycandidate.php">
              <button class="magnifyBtn" style="margin-bottom: 40px; margin-left:180px">Apply</button>
            </form>
            <button class="magnifyBtn" style="margin-bottom: 40px; margin-left: 60px" onclick="status()"> Status </button>
            </div>
      </div>
    </div>
    </div>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin login</title>
    <link rel="stylesheet" href="..\css\signin.css">
    <?php
    $errmsg="";
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "Gobi@1234";

        // Create connection
        $conn = new mysqli($servername, $username, $password,'voting');

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
            $id = $_POST['id'];
            $password = $_POST['password'];
            $sql= "SELECT * FROM admin WHERE id = '$id' AND password = '$password' ";
            $result = mysqli_query($conn,$sql);
            $check = mysqli_fetch_array($result);
            if(isset($check)){
                  $_SESSION['id'] = $id;
                  header('Location: admindashboard.php');
            }
            else{
            $errmsg="*Username or password is wrong";
            }
      }
     ?>
  </head>
  <body>
    <div class="center">
      <h1>Admin Login</h1>
      <form action="adminlogin.php" method="post">
      <div class="txt_field">
          <input id="id" name="id" type="text" pattern="[0-9]" required>
          <span></span>
          <label>Id</label>
        </div>
        <div class="txt_field">
          <input id="name" name="name" type="text" required>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input id="email" name="email" type="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input id="password" name="password" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" id="submit" value="submit">
      </form>
        <span style="color:red;margin-left: 15px;"><?php echo "$errmsg"; ?></span>
    </div>

  </body>
</html>

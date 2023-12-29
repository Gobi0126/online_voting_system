<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .container {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 5px 0;
        }

        .button-container {
            margin-top:10px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        input[type="submit"] {
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        .message {
            color: #4CAF50;
            margin-top: 10px;
        }

        .back-button {
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration:none;
        }
    </style>

</head>
<body>
    <h1>OTP Verification</h1>
    <p>Check your email for the OTP and enter it below:</p>

    <?php
    session_start();

    if (isset($_POST['verify'])) {
        $enteredOTP = $_POST['enteredOTP'];

        if ($_SESSION['registration_otp'] == $enteredOTP) {

            $conn = mysqli_connect('localhost', 'root', 'Gobi@1234', 'voting') or die("Connection failed: " . mysqli_connect_error());
            
            $name = $_SESSION['name']; 
            $email = $_SESSION['email']; 
            $regno = $_SESSION['regno']; 
            $phoneno = $_SESSION['phoneno']; 
            $password = $_SESSION['password']; 
            $gender = $_SESSION['gender']; 

            $sql = "INSERT INTO `users` (`name`, `regno`, `email`, `phoneno`, `password`, `gender`) VALUES ('$name', '$regno', '$email', '$phoneno', '$password', '$gender')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo '<p class="message">Registration is complete. You can now log in.</p>';
                header('Location: signin.php');
            } else {
                echo "Error occurred during registration.";
            }
        } else {
            echo '<p class="message">Incorrect OTP. Please try again.';
        }
    }
    ?>

    <div class="container">
        <form method="post" action="otp_verification.php">
            <label for="enteredOTP">Enter OTP:</label>
            <input type="text" name="enteredOTP" id="enteredOTP" style="width: 275px;" required>
            <div class="button-container">
                <input type="submit" name="verify" value="Verify OTP">
                <a href="index.html" class="back-button">Back</a>
            </div>
        </form>
    </div>
</body>
</html>

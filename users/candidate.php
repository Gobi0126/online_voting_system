<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<?php
    function hasVoted($regno) {
        $conn = mysqli_connect("localhost", "root", "Gobi@1234", "voting") or die("Connection failed: " . mysqli_connect_error());
        $regno = mysqli_real_escape_string($conn, $regno);
        $sql = "SELECT COUNT(*) as count FROM votes WHERE regno = '$regno'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row['count'] > 0;
    }    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $id="";
    $id= $_SESSION['regno'];
    $conn = mysqli_connect("localhost", "root", "Gobi@1234", "voting") or die("Connection failed: " . mysqli_connect_error());
    $query21="select name from users where regno = '$id' ";
    $a1= mysqli_query($conn,$query21);
    $row1=mysqli_fetch_assoc($a1);
    $id1=$row1["name"];
    if(isset($_POST['vote'])) {
        if (!hasVoted($id)) {
            $candidateName = $_POST['candidateName'];
            $candidateRegNo = $_POST['candidateRegNo'];
            insert($candidateName, $candidateRegNo, $id, $id1);
            header("Location: success.php");
            exit();
        } 
        else {
            echo "You have already voted. You cannot vote again.";
        }
    }
?>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }
    .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .card {
            margin-top:30px;
            width: 30%; 
            margin-bottom: 20px;
        }
</style>

    <?php
    function insert($candidateName, $candidateRegNo,$regno,$name) {
            $conn = mysqli_connect("localhost", "root", "Gobi@1234", "voting") or die("Connection failed: " . mysqli_connect_error());
            $candidateName = mysqli_real_escape_string($conn, $candidateName);
            $candidateRegNo = mysqli_real_escape_string($conn, $candidateRegNo);
            $sql = "INSERT INTO `votes`(`name`, `regno`, `candidate_name`, `candidate_regno`) VALUES ('$name', '$regno', '$candidateName', '$candidateRegNo')";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
    ?>

</head>
<body>

  <div class="card-container">
  <?php
    require_once('../dbConnect.php');
    $sql = "SELECT * FROM candidates_request WHERE status = 'approved'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $candidates = $stmt->fetchAll();
    if (count($candidates) > 0) {
        foreach ($candidates as $candidate) {
            ?>
            <!-- <div class="col-md-3" style="margin-left: 25px; padding-top: 30px;"> -->
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../img/9.svg" alt="shinzo" height="350px">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $candidate['name']; ?></h2>
                    <p class="card-text"><?php echo $candidate['regno']; ?></p>
                    <form method="post">
                        <input type="hidden" name="candidateName" value="<?php echo $candidate['name']; ?>">
                        <input type="hidden" name="candidateRegNo" value="<?php echo $candidate['regno']; ?>">
                        <button type="submit" name="vote" class="btn btn-primary">Vote Now</button>
                    </form>
                </div>
            </div>
            <!-- </div> -->
            <?php
        }
    } 
    else {
        echo "No approved candidates found.";
    }
    ?>
    </div>

<!--     
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

</body>
</html>
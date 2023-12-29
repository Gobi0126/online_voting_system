<?php

include("../dbConnect.php");


$sql = "SELECT candidate_name,count(*) as result from  `votes` group by candidate_name";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rs =  $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<style>
    .card-5 {
        border: 2px solid #000;
        padding: 30px;
        margin-top: 5%;
        width: 70%;
        margin-left: auto;
        margin-right: auto;
        background-color: #f5f5f5;
        border-radius: 10px;
    }

    #footersection {
        margin-top: 18%;
    }

    .result-title {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .result-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .result-bar {
        background-color: #28a745;
        height: 20px;
        border-radius: 5px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .result-bar .progress-bar {
        border-radius: 5px;
        color: #fff;
        text-align: right;
        padding-right: 5px;
    }

    .progress-label {
        margin-left: 10px;
        font-weight: bold;
    }

    .progress-container {
        height: 20px;
        background-color: #ccc;
        border-radius: 5px;
    }
</style>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-5">
                <h2 class="result-title"><strong>Result</strong></h2>
                <hr>
                <?php foreach($rs as $row): ?>
                <div class="result-item">
                    <div>
                        <strong><?php echo $row['candidate_name']; ?> = <?php echo $row['result']; ?></strong>
                    </div>
                </div>
                <div class="progress-container">
                    <div class="result-bar" style="width: <?php echo $row['result']; ?>%;"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

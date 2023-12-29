<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hello {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            margin: 0;
        }

        button {
            margin-top:10px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="hello">
    <h>You have been voted successfully. You cannot vote again.</h>
    <button onclick="window.location.href='studentdashboard.php'">Back</button>
    </div>
</body>
</html>

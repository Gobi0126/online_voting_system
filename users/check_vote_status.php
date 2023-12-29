<?php
session_start();
$conn = mysqli_connect("localhost", "root", "Gobi@1234", "voting") or die("Connection failed: " . mysqli_connect_error());
$regno = $_SESSION['regno'];
$sql = "SELECT * FROM votes WHERE regno = '$regno'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    echo "voted";
} else {
    echo "not_voted";
}
?>

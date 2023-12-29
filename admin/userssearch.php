<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	 font-family: helvetica;
}


.wrapper{
  margin-top: 85px;
	display: flex;
	justify-content: center;
}

.search-bar {
  display: flex;
  align-items: center;
  max-width: 400px;
  margin: 0 auto;
}

.search-input {
  flex: 1;
  height: 40px;
  padding: 10px;
  border: 2px solid #3498db;
  border-radius: 50px;
  font-size: 16px;
  outline: none;
}

.search-button {
  height: 40px;
  padding: 0 20px;
  background: #3498db;
  border: none;
  border-radius: 50px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

.search-button:hover {
  background: #297dbf;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

::placeholder {
  color: #fff;
}

::-webkit-input-placeholder {
  color: #fff;
}

:-ms-input-placeholder {
  color: #fff;
}

/* *{
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Encode Sans Expanded",sans-serif;
} */
table {
width: 750px;
border-collapse: collapse;
margin:50px auto;
}

/* Zebra striping */
tr:nth-of-type(odd) {
background: #eee;
}

th {
background: #3498db;
color: white;
font-weight: bold;
}

td, th {
padding: 10px;
border: 1px solid #ccc;
text-align: left;
font-size: 18px;
}
.approvebtn{
  border-radius: 50px;
  background: #01bf71;
  /* whitespace: nowrap;
  padding: 10px 22px;
  color: #010606;
  font-size: 16px; */ 
   outline: none;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
  text-decoration: none;

}
/*
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

table {
    width: 100%;
}

/* Force table to not be like tables anymore */
table, thead, tbody, th, td, tr {
  display: block;
}
th {
 background: black;
	color: white;
	font-weight: 100%;
  
	}
/* Hide table headers (but not display: none;, for accessibility) */
thead tr {
  position: absolute;
  top: -9999px;
  left: -9999px;
}

tr { border: 1px solid #ccc; }

td {
  /* Behave  like a "row" */
  border: none;
  border-bottom: 1px solid #eee;
  position: relative;
  padding-left: 50%;
}

td:before {
  /* Now like a table header */
  position: absolute;
  /* Top/left values mimic padding */
  top: 6px;
  left: 6px;
  width: 45%;
  padding-right: 10px;
  white-space: nowrap;
  /* Label the data */
  content: attr(data-column);

  color: #000;
  font-weight: bold;
}


}
</style>

  </head>
  <body>
  <?php include 'header.php';?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<form class="" action="userssearch.php" method="post">
<div class="wrapper">
	<div class="search-box">
		<input type="text" name="regno" id="regno" class="search-input" placeholder="Enter user's regno" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}">
    <button class="search-button" type="submit" name="submit">Find</button>
    <!-- <div class="search-button"><input class="btn"  type="submit" name="submit" value="find"> </div> -->
  </div>
</div>
</form>

<table>
<thead>
  <tr>
    <th>Reg No</th>
    <th>Name</th>
    <th>Phone no</th>
    <th>Email</th>
  </tr>
</thead>
<tbody>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("localhost", "root", "Gobi@1234", "voting");
    $regno = $_POST['regno'];

    $sql = "SELECT name,regno, phoneno, email FROM users WHERE regno = '$regno';";
    $query = mysqli_query($conn, $sql);

    // Check if a row was found
    if ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?php echo $row['regno']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phoneno']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <?php
    } else {
        // Handle case where no row was found
        echo "No user found with the given registration number.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>











</tbody>
</table>

  </body>
</html>

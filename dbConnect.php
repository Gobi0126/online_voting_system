<?php

$dsn = "mysql:host=localhost;dbname=voting";
$user = "root";
$pass = "Gobi@1234";
$option = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,PDO::FETCH_ASSOC];


try {
 $pdo =  new PDO($dsn,$user,$pass,$option);

}

catch(PDOException $e) {
	echo $e->getMessage();
}
?>
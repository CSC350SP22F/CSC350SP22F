<?php 
/********** CONNECT TO THE DATABASE **********/
$servername="localhost";
$username="root";
$password= "root";
$connect=mysqli_connect($servername,$username,$password);
if(!$connect)  die("Not connected"); //else echo "connected";

else
	$sql = "INSERT INTO animal.animals (AnimalType, AnimalHabitat) 
	VALUES('".$_REQUEST['ANimal']."', '".$_REQUEST['HAbitat']."')";
	$result = mysqli_query($connect, $sql);


if($result)
	echo "ANIMAL INSERTED";
else
	echo "ANIMAL NOT INSERTED".mysqli_error($connect);
 ?>
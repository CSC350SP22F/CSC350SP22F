<?php 
session_start();
$con = mysql_connect("locahost","root","","laundry");

if(isset($_POST['btnschedule'])){
	$schedulebtn = $_POST['schedulebtn'];

	$query = "INSERT INTO timeslot(timeSlot) VALUES('$schedulebtn')";
	$query_run = mysqli_query($con,$query);

	if($query_run){
		$_SESSION['status'] = "SUCCESSFUL";
		header("Location: confirmation.php");
	}else{
		$_SESSION['status'] = "Couldn't Insert";
	}
}
















 ?>
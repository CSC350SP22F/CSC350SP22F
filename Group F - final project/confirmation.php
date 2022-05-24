<?php 
include "config.php";

$sql = "select * FROM laundry WHERE aptNum ='".$_REQUEST['aptNum']"' ";
$result = mysqli_query($con, $sql); 	 // Send the query to the database
if (mysqli_num_rows($result) > 0) 			// If there are rows present
{
		echo "<table border='1'><tr><td>Apt Number</td><td>Time Slot</td></tr>";
		while($row = mysqli_fetch_assoc($result)) 									// fetch next row
		{ 																			// display the data
			echo "<tr><td>".$row["aptNum"]." </td><td>". $row["timeSlot"]."</td></tr>"; // output data of that row
		}
		echo "</table>";
}


 ?>
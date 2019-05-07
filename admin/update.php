<?php

include('dbconnect.php');

$lot_no = $_GET['lot_no'];
$status = $_GET['status'];



$query = "UPDATE tblots SET status = '$status' WHERE lot_no = '$lot_no' ";

if(mysqli_query($conn,$query))
{
	header("Location: index.php");
}
else
{
	echo("Error...");
}

mysqli_close($conn);

?>
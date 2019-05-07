<?php

include('dbconnect.php');

$student_no = $_POST['student_no'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$course = $_POST['course'];
$year_entry = $_POST['year_entry'];


$query = "INSERT INTO studinfo (student_no, lname, fname, mname, course, year_entry) VALUES ('$student_no', '$lname', '$fname', '$mname', '$course', '$year_entry')";

if(mysqli_query($conn,$query))
{
	header("Location: viewrec.php");
}
else
{
	echo("ERROR FORM IS NULL");
}

mysqli_close($conn);

?>

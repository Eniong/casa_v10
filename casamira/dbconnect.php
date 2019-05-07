<?php

$host = "localhost";
$user = "root";
$password ="";
$db = "dbmap";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn)
{
	die("Error in Connection");
}
else
{
	echo("");
}

?>
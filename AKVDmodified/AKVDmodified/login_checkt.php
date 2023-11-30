<?php

error_reporting(0);
session_start();


$host = "localhost";

$user = "root";

$password = "";

$db = "schoolproject";


$data = mysqli_connect($host, $user, $password, $db);


if ($data === false) {
	die("connection error");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['username']; /*form name="" */

	$pass = $_POST['password'];


	$sql = "SELECT * FROM teacher WHERE username/*db */='" . $name . "' AND password='" . $pass . "'  ";

	$result = mysqli_query($data, $sql);

	$row = mysqli_fetch_array($result);



	if ($row["username"] != "admin") /*from db */{

		$_SESSION['username'] = $name;

		

		header("location:teacherhome.php");
	} else {


		// incorrect username or password
		header("location:logint.php?error=1");
		exit();
	}


}


?>
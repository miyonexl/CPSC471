<?php
// Start the session
session_start();
?>

<?php
	$username = $_POST["uname"];
	$psw = $_POST["psw"];

	if($username != "admin" || $psw != "test"){
		header("Location: login.php");
	}else{
		$_SESSION["username"] = $username;
		header("Location: EmployeeDashboard.php");
	}
?>
<?php
// Start the session
session_start();
?>

<?php
	$uname = $_POST["uname"];
	$psw = $_POST["psw"];

    $_SESSION["uname"] = $uname;

    // put your code here
    $servername = "localhost";          //should be same for you
    $username = "root";                 //same here
    $password = "MusicDataBase";             //your localhost root password
    $db = "cpsc471";                     //your database name
            
    $conn = new mysqli($servername, $username, $password, $db);
            
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    $link = mysqli_connect($servername, $username, $password, $db);
    $uname =  mysqli_real_escape_string($link, $_POST["uname"]);        // sql injection prevention
    $psw = mysqli_real_escape_string($link, $_POST["psw"]);             // sql injection prevention

    $sql = "SELECT * FROM EMPLOYEE
    WHERE EmployeeID = '$uname' AND Password = '$psw'";

    $result = $conn->query($sql);


    if($result->num_rows > 0){
    	$row = $result->fetch_assoc();
    	$_SESSION["fName"] = $row["FName"];
    	$_SESSION["lName"] = $row["LName"];
    	$_SESSION["type"] = $row["UserType"];
    	header("Location: dashboard.php");
    }else{
    	header("Location: login.php?Message=Invalid Username or Password");
    }

    $conn->close();
?>
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

    $sql = "SELECT * FROM EMPLOYEE
    WHERE EmployeeID = ('$uname') AND Password = ('$psw')";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
    	$row = $result->fetch_assoc();
    	$_SESSION["fName"] = $row["FName"];
    	$_SESSION["lName"] = $row["LName"];
    	$_SESSION["type"] = $row["UserType"];
    	header("Location: dashboard.php");
    }else{
    	header("Location: login.php");
    }

    $conn->close();
?>
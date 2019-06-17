<?php
// Start the session
session_start();
?>
<?php 

    // put your code here
    $servername = "localhost";          //should be same for you
    $username = "root";                 //same here
    $password = "MusicDataBase";             //your localhost root password
    $db = "cpsc471";                     //your database name
            
    $conn = new mysqli($servername, $username, $password, $db);
            
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }


    $pname = $_POST["pname"];
    $eId = $_POST["eId"];
    $date = $_POST["date"];
    $aType = $_POST["aType"];
    $task = $_POST["task"];
    $hours = $_POST["hours"];
    $uname = $_SESSION["uname"];

    $sql = "INSERT INTO ALLOCATE VALUES('$pname', '$eId', '$uname', '$date', '$hours' )";


    if($conn->query($sql) != TRUE){
        die("Connection faileddddd".$conn->connect_error);
    }

    $sql = "INSERT INTO ALLOCATION VALUES('$pname', '$eId', '$uname', '$date', '$aType', '$task' )";


    if($conn->query($sql) != TRUE){
        die("Connection faileddddd".$conn->connect_error);
    }

    header("Location: dashboard.php");

    $conn-> close();
?>
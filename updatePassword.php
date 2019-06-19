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



    $cPsw = $_POST["cPsw"];
    $nPsw = $_POST["nPsw"];
    $nPsw2 = $_POST["nPsw2"];
    $uname = $_SESSION["uname"];
    

    $sql = "SELECT Password FROM EMPLOYEE WHERE EmployeeID = '$uname'";

    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();  
        if($cPsw != $row["Password"]){
            header("Location: changePassword.php?Message='Invalid Password'");
        }
    }else{
        header("Location: changePassword.php?Message='no Password'");
    }

    if($nPsw == $nPsw2){
        $sql = "UPDATE EMPLOYEE SET Password = '$nPsw' WHERE EmployeeID = '$uname'";
        session_destroy();
        header("location:login.php");
    }else{
        header("Location: changePassword.php?Message='New Password does not match'");
    }


    if($conn->query($sql) != TRUE){
        die("Connection failed".$conn->connect_error);
    }
    
    $conn-> close();
?>
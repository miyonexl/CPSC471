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

    $updatePrj = $_POST["updatePrj"];

    if($updatePrj == "0"){
        //Add case
        $pname = $_POST["pname"];
        $pnum = $_POST["pnum"];
        $req = $_POST["req"];
        $desc = $_POST["desc"];
        $pType = $_POST["pType"];

        $sql = "INSERT INTO PROJECT "
                ."VALUES ('$pname', '$pnum', '$req', '$desc', '$pType')";

        if($conn->query($sql) != TRUE){
            die("Connection failed".$conn->connect_error);
        }

        header("Location: viewProject.php");
    }else if($updatePrj == "1"){
        //Edit case
        $pname = $_POST["pname"];
        $req = $_POST["req"];
        $desc = $_POST["desc"];
        $pType = $_POST["pType"];

        $sql = "SELECT * FROM PROJECT WHERE ProjName = '$pname'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($req == ''){
            $req = $row["Requirements"];
        }
        if($desc == ''){
            $desc = $row["Description"];
        }
        if($pType == ''){
            $pType = $row["ProjType"];
        }

        $sql = "UPDATE PROJECT "
                ."SET Requirements = '$req', Description = '$desc', ProjType = '$pType' "
                ."WHERE ProjName = '$pname'";

        if($conn->query($sql) != TRUE){
            die("Connection failed".$conn->connect_error);
        }

        header("Location: viewProject.php");

    
    }else if($updatePrj == "2"){
        //Delete case
        $pname = $_POST["pname"];

        $sql = "DELETE FROM PROJECT "
        ."WHERE ProjName = '$pname'";

        if($conn->query($sql) != TRUE){
            die("Connection failed".$conn->connect_error);
        }

        header("Location: viewProject.php");
    }

    $conn-> close();
?>
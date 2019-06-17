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

    $updateEmp = $_POST["updateEmp"];

    if($updateEmp == "0"){
        //Add case
        $eId = $_POST["eId"];
        $fName = $_POST["fName"];
        $mName = $_POST["mName"];
        $lName = $_POST["lName"];
        $uType = $_POST["uType"];
        $psw = $_POST["psw"];

        $sql = "INSERT INTO EMPLOYEE "
                ."VALUES ('$eId', '$fName', '$mName', '$lName', '0', '0', 'Dept1', 'CompanyI', NULL, '$uType', '$psw')";

        if($conn->query($sql) != TRUE){
            die("Connection faileddddd".$conn->connect_error);
        }

        header("Location: viewEmployee.php");
    }else if($updateEmp == "1"){
        //Edit case
        $eId = $_POST["eId"];
        $fName = $_POST["fName"];
        $mName = $_POST["mName"];
        $lName = $_POST["lName"];
        $uType = $_POST["uType"];
        $sal = $_POST["sal"];
        $dept = $_POST["dept"];

        $sql = "SELECT * FROM EMPLOYEE WHERE EmployeeID = '$eId'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($fName == ''){
            $fName = $row["FName"];
        }
        if($mName == ''){
            $mName = $row["MName"];
        }
        if($lName == ''){
            $lName = $row["LName"];
        }
        if($uType == ''){
            $uType = $row["UserType"];
        }
        if($sal == ''){
            $sal = $row["Salary"];
        }
        if($dept == ''){
            $dept = $row["DeptName"];
        }

        $sql = "UPDATE EMPLOYEE "
                ."SET FName = '$fName', MName = '$mName', LName = '$lName', UserType = '$uType', Salary = '$sal', DeptName = '$dept' "
                ."WHERE EmployeeID = '$eId'";

        if($conn->query($sql) != TRUE){
            die("Connection failed".$conn->connect_error);
        }

        header("Location: viewEmployee.php");

    
    }else if($updateEmp == "2"){
        //Delete case
        $eId = $_POST["eId"];

        $sql = "DELETE FROM EMPLOYEE "
        ."WHERE EmployeeID = '$eId'";

        if($conn->query($sql) != TRUE){
            die("Connection failed".$conn->connect_error);
        }

        header("Location: viewEmployee.php");
    }

    $conn-> close();
?>
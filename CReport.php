<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Company Report</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div id="welcomeBox"> 
        <h2 id="Welcome">Company Reports</h2>
        <a href="./settings.php">settings</a>
    </div>

    <div id="mainView">
        <?php 
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];

            // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "MusicDataBase";             //your localhost root password
            $db = "cpsc471";                     //your database name
                    
            $conn = new mysqli($servername, $username, $password, $db);
                    
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }

            $sql = "SELECT  `M`.`DeptName`, `A`.`EmployeeID`, `T`.`Date`, `T`.`ProjName`, `A`.`AllocType`, `A`.`Task`, `L`.`Hours` "
                    ."FROM        `REQUEST_REPORT` T, `REPORT` R, `EMPLOYEE` E, `ALLOCATE` L, `ALLOCATION` A, `EMPLOYEE` M "
                    ."WHERE   `R`.`ReportType` = 'c' AND `R`.`EmployeeID` = `T`.`UserID` AND `T`.`UserID` = `E`.`EmployeeID` "
                    ."AND `E`.`UserType` = 'm' AND `T`.`ProjName` = `A`.`ProjName` AND `T`.`EmployeeID` = `A`.`EmployeeID` "
                    ."AND `T`.`ManagerID` = `A`.`ManagerID` AND `T`.`Date` = `A`.`Date` AND `A`.`ProjName` = `L`.`ProjName` "
                    ."AND `A`.`EmployeeID` = `L`.`EmployeeID`AND `A`.`ManagerID` = `L`.`ManagerID` AND `A`.`Date` = `L`.`Date` "
                    ."AND `T`.`Date` >= `T`.`RStartDate` AND `T`.`Date` <= `T`.`REndDate` AND`L`.`EmployeeID` = `M`.`EmployeeID` "
                    ."AND `T`.`RStartDate` = '$startDate' AND `T`.`REndDate` = '$endDate' "
                    ."ORDER BY    `M`.`DeptName`, `T`.`Date` ASC, `T`.`ProjName`";


            $result = $conn->query($sql);

            if($result->num_rows > 0){
            echo "<table><tr><th>Employee ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Department</th></tr>";
            while($row = $result->fetch_assoc()){
                  echo "<tr><td>".$row["EmployeeID"]."</td><td>".$row["FName"]."</td><td>".$row["MName"]."</td><td>".$row["LName"]."</td><td>".$row["DeptName"]."</td></tr>";
            }
            echo "</table>";
        }else{

            echo "No projects";
        }
            $conn-> close();
        ?>
    </div>

</body>

</html>
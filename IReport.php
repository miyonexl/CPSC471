<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Company Report</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>

    <style>
        table {
            font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            font-size: 80%;
            border: 1px solid #777777;
            text-align: left;
            padding: 8px;
        }

        th {
            font-size: 125%;
            border: 1px solid #777777;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #60a4db;
        }

        tr:nth-child(odd){
            background-color: #d8d8d8;
        }
    </style>
</head>

<body>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>
    <div id="welcomeBox"> 
        <h2 id="Welcome">Individual Report</h2>
        <a href="#" onclick="goBack()">Go back</a>
    </div>

    <div id="mainView">
        <?php 
            $eId = $_GET["eId"];
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];
            $uname = $_SESSION["uname"];


            // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "MusicDataBase";             //your localhost root password
            $db = "cpsc471";                     //your database name
                    
            $conn = new mysqli($servername, $username, $password, $db);
                    
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            if($_SESSION["type"] == "m"){
                //Manager session query
                $sql = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`, `A`.`Hours` "
                        ."FROM        `EMPLOYEE` E, `EMPLOYEE` M, `ALLOCATE` A, `ALLOCATION` L "
                        ."WHERE   `M`.`EmployeeID` = '$uname' AND `M`.`UserType` = 'm' AND `E`.`EmployeeID` "
                        ."= '$eId' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND "
                        ."`A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` >= '$startDate' AND "
                        ."`A`.`Date` <= '$endDate' "
                        ."ORDER BY    `A`.`Date` ASC, `A`.`ProjName`";
            }else{
                //Employee session query
               $startDate = $_POST["startDate"];
               $endDate = $_POST["endDate"];

                $sql = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`, `A`.`Hours` "
                        ."FROM        `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L "
                        ."WHERE   `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND "
                        ."`A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` >= '$startDate' AND "
                        ."`A`.`Date` <= '$endDate' "
                        ."ORDER BY    `A`.`Date` ASC, `A`.`ProjName`";
            }


            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<table><tr><th>Employee ID</th><th>Date</th><th>Project Name</th><th>Allocation Type</th><th>Task</th><th>Hours</th></tr>";
                while($row = $result->fetch_assoc()){
                  echo "<tr><td>".$row["EmployeeID"]."</td><td>".$row["Date"]."</td><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Task"]."</td><td>".$row["Hours"]."</td></tr>";
                }
                echo "</table>";
            }else{
                echo "nothing";
            }
            $conn-> close();
        ?>
    </div>

</body>

</html>
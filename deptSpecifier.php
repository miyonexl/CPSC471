<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Department Report</title>
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
    <div id="welcomeBox"> 
        <h2 id="Welcome">Departments</h2>
        <a href="./settings.php">settings</a>
    </div>

    <div id="mainView">
        <div id="test"></div>
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

            $sql = "SELECT * FROM DEPARTMENT";


            $result = $conn->query($sql);


            if($result->num_rows > 0){
                echo "<table><tr><th>Department name</th><th>Department number</th><th>Company name</th></tr>";
                while($row = $result->fetch_assoc()){
                    if($_SESSION["rType"] == "D"){
                        echo "<tr><td><a href=\"DReport.php?dept=".$row["DeptName"]. "&startDate=".$startDate."&endDate=".$endDate."\">".$row["DeptName"]."</td><td>".$row["DeptNumber"]."</td><td>".$row["CompName"]."</a></td></tr>";
                    }else{
                        echo "<tr><td><a href=\"IReport.php?dept=".$row["DeptName"]. "&startDate=".$startDate."&endDate=".$endDate."\">".$row["DeptName"]."</td><td>".$row["DeptNumber"]."</td><td>".$row["CompName"]."</a></td></tr>";
                    }
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


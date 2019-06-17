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
            $dept = $_GET["dept"];
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

        $sql = "SELECT EmployeeID, FName, MName, LName FROM EMPLOYEE WHERE DeptName = '$dept'";


        $result = $conn->query($sql);


        if($result->num_rows > 0){
            echo "<table><tr><th>Employee ID</th><th>First name</th><th>Middle name</th><th>Last name</th></tr>";
                while($row = $result->fetch_assoc()){
                    echo "<tr><td><a href=\"IReport.php?eId=".$row["EmployeeID"]. "&startDate=".$startDate."&endDate=".$endDate."\">".$row["EmployeeID"]."</td><td>".$row["FName"]."</td><td>".$row["MName"]."</td><td>".$row["LName"]."</td></tr>";
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
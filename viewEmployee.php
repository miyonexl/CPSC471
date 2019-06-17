<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>View Employees</title>
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


	<div class="welcomeBox"> 
    <h2 class="Welcome">View Employees:</h2>
    <a href="./settings.php">settings</a>
  </div>

  <div class="options">
    <button onclick="javascript:location.href='dashboard.php'">Home</button>
		<button onclick="javascript:location.href='addEmployee.php'">Add</button>
		<button onclick="javascript:location.href='editEmployee.php'">Edit</button>
		<button onclick="javascript:location.href='deleteEmployee.php'">Delete</button>
  </div>

  <div class="mainView">
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

        $sql = "SELECT EmployeeID, FName, MName, LName, DeptName FROM EMPLOYEE";


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
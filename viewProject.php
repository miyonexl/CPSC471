<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashboard</title>
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
    <h2 class="Welcome">View Projects:</h2>
    <a href="./settings.php">settings</a>
  </div>

  <div class="options">
    <button onclick="javascript:location.href='dashboard.php'">Home</button>
		<button onclick="javascript:location.href='addProject.php'">Add</button>
		<button onclick="javascript:location.href='editProject.php'">Edit</button>
		<button onclick="javascript:location.href='deleteProject.php'">Delete</button>
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

        $sql = "SELECT * FROM PROJECT";


        $result = $conn->query($sql);


        if($result->num_rows > 0){
            echo "<table><tr><th>Project name</th><th>Project number</th><th>Requirements</th><th>Description</th><th>Project type</th></tr>";
            while($row = $result->fetch_assoc()){
                  echo "<tr><td>".$row["ProjName"]."</td><td>".$row["ProjNumber"]."</td><td>".$row["Requirements"]."</td><td>".$row["Description"]."</td>";
                  if($row["ProjType"] == "p"){
                    $type = "Pipeline";
                  }else if($row["ProjType"] == "o"){
                    $type = "Ongoing";
                  }else if($row["ProjType"] == "f"){
                    $type = "Finished";
                  }else if($row["ProjType"] == "c"){
                    $type = "Canceled";
                  }
                  echo "<td>".$type."</td></tr>";
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
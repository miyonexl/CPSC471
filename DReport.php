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

            $sql = "SELECT    *"
                    ."FROM        ( ( REQUEST_REPORT NATURAL JOIN EMPLOYEE) NATURAL JOIN"
                    ."REPORT) NATURAL JOIN ALLOCATE"
                    ."WHERE    ManagerID <> NULL AND Date >= '$startDate' AND Date <= 'endDate' AND"
                    ."ReportType = \"c\""
                    ."ORDER BY    Date, ProjName";


            $result = $conn->query($sql);

            if($result->num_rows > 0){
            echo "got something";
                while($row = $result->fetch_assoc()){
                    echo $row;
                }
            }else{
                echo "nothing";
            }
            $conn-> close();
        ?>
    </div>

</body>

</html>
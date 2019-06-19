<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashboard</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<?php
        // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "MusicDataBase";             //your localhost root password
            $db = "cpsc471";                     //your database name

            $uname = $_SESSION["uname"];
            
           

            $conn = new mysqli($servername, $username, $password, $db);
                    
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }



          date_default_timezone_set('America/Edmonton');
          $today = date('Y-m-d');
          $month = date("F",strtotime($today));
          $year = date("Y",strtotime($today));
          $day = date("d",strtotime($today));
          $week = date("W",strtotime($today));
          $nextweek = date("Y-m-d", strtotime("+1 week"));
          
          $monday = date("d", strtotime('Monday this week'));
          $tuesday = date("d", strtotime('Tuesday this week')); 
          $wednesday = date("d", strtotime('Wednesday this week')); 
          $thursday = date("d", strtotime('Thursday this week')); 
          $friday = date("d", strtotime('Friday this week')); 
          $saturday = date("d", strtotime('Saturday this week')); 
          $sunday = date("d", strtotime('Sunday this week')); 

          $mondayFull = date("Y-m-d", strtotime('Monday this week'));
          $tuesdayFull = date("Y-m-d", strtotime('Tuesday this week')); 
          $wednesdayFull = date("Y-m-d", strtotime('Wednesday this week')); 
          $thursdayFull = date("Y-m-d", strtotime('Thursday this week')); 
          $fridayFull = date("Y-m-d", strtotime('Friday this week')); 
          $saturdayFull = date("Y-m-d", strtotime('Saturday this week')); 
          $sundayFull = date("Y-m-d", strtotime('Sunday this week'));   

        if($_SESSION["type"] == "m"){ ?>
        	<div id="welcomeBox"> 
        		<h2 id="Welcome">Welcome to your dashboard, <?php echo $_SESSION["fName"] ?> <?php echo$_SESSION["lName"]?></h2>
       			<a href="./settings.php">settings</a>
    		</div>

    		<div id="options">
        		<button onclick="javascript:location.href='ManagerReport.php'">Request work report</button>
        		<button onclick="javascript:location.href='viewProject.php'">View projects</button>
        		<button onclick="javascript:location.href='viewEmployee.php'">View employees</button>
        		<button onclick="javascript:location.href='addWorkAlloc.php'">Add work allocation</button>
    		</div>

        <?php
          $sqlMonday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$mondayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultMonday = $conn->query($sqlMonday);

          $sqlTuesday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$tuesdayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultTuesday = $conn->query($sqlTuesday);

          $sqlWednesday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$wednesdayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultWednesday = $conn->query($sqlWednesday);

          $sqlThursday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$thursdayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultThursday = $conn->query($sqlThursday);

          $sqlFriday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$fridayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultFriday = $conn->query($sqlFriday);

          $sqlSaturday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$saturdayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultSaturday = $conn->query($sqlSaturday);

          $sqlSunday = "SELECT  `A`.`EmployeeID`, `A`.`Date`, `A`.`ProjName`, `L`.`AllocType`, `L`.`Task`,
                          `A`.`Hours`
                  FROM    `EMPLOYEE` E, `ALLOCATE` A, `ALLOCATION` L
                  WHERE `E`.`EmployeeID` = '$uname' AND `E`.`EmployeeID` = `A`.`EmployeeID` AND 
                         `A`.`EmployeeID` = `L`.`EmployeeID` AND `A`.`Date` = '$sundayFull'
                  ORDER BY  `A`.`Date` ASC, `A`.`ProjName`";
          $resultSunday = $conn->query($sqlSunday);

              
                        ?>

    		<div id="mainView">
                <div class="month"> 
                  <ul>
                    <!-- <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li> -->
                    <li><?php echo $month ?><br><span style="font-size:18px"><?php echo $year ?></span></li>
                  </ul>
                </div>

                <ul class="weekdays">
                  <li>Mo</li>
                  <li>Tu</li>
                  <li>We</li>
                  <li>Th</li>
                  <li>Fr</li>
                  <li>Sa</li>
                  <li>Su</li>
                </ul>

                <ul class="days"> 
                  <li><?php echo $monday ?></li>
                  <li><?php echo $tuesday ?></li>
                  <li><?php echo $wednesday ?></li>
                  <li><?php echo $thursday ?></li>
                  <li><?php echo $friday ?></li>
                  <li><?php echo $saturday ?></li>
                  <li><?php echo $sunday ?></li>
                  <!-- <li><span class="active">10</span></li> -->
                </ul>  

                <?php 
                
            ?>
                <ul class="days">
                  <li><?php 
                    if($resultMonday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultMonday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?>
                  </li>
                  <li>
                    <?php 
                    if($resultTuesday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultTuesday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?>
                  </li>
                  <li><?php 
                    if($resultWednesday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultWednesday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }?></li>
                  <li> <?php 
                    if($resultThursday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultThursday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?></li>
                  <li><?php 
                    if($resultFriday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultFriday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?></li>
                  <li><?php 
                    if($resultSaturday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultSaturday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?></li>
                  <li><?php 
                    if($resultSunday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultSunday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }$conn-> close();
                   ?></li>
                </ul>    
            </div>
    		<?php
        }else{ $_SESSION["rType"] = "I";?>
        	<div id="welcomeBox"> 
        		<h2 id="Welcome">Welcome to your dashboard, <?php echo $_SESSION["fName"] ?> <?php echo$_SESSION["lName"]?></h2>
        		<a href="./settings.php">settings</a>
    		</div>

    		<div id="options">
        		<button onclick="javascript:location.href='dateSpecifier.php'">Request work report</button>
    		</div>

    		<div id="mainView">
                <div class="month"> 
                  <ul>
                    <!-- <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li> -->
                    <li><?php echo $month ?><br><span style="font-size:18px"><?php echo $year ?></span></li>
                  </ul>
                </div>

                <ul class="weekdays">
                  <li>Mo</li>
                  <li>Tu</li>
                  <li>We</li>
                  <li>Th</li>
                  <li>Fr</li>
                  <li>Sa</li>
                  <li>Su</li>
                </ul>

                <ul class="days"> 
                  <li><?php echo $monday ?></li>
                  <li><?php echo $tuesday ?></li>
                  <li><?php echo $wednesday ?></li>
                  <li><?php echo $thursday ?></li>
                  <li><?php echo $friday ?></li>
                  <li><?php echo $saturday ?></li>
                  <li><?php echo $sunday ?></li>
                  <!-- <li><span class="active">10</span></li> -->
                </ul>  

                <?php 
                
            ?>
                <ul class="days">
                  <li><?php 
                    if($resultMonday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultMonday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?>
                  </li>
                  <li>
                    <?php 
                    if($resultTuesday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultTuesday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?>
                  </li>
                  <li><?php 
                    if($resultWednesday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultWednesday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }?></li>
                  <li> <?php 
                    if($resultThursday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultThursday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?></li>
                  <li><?php 
                    if($resultFriday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultFriday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?></li>
                  <li><?php 
                    if($resultSaturday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultSaturday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }
                   ?></li>
                  <li><?php 
                    if($resultSunday->num_rows > 0){
                echo "<table><th>Project</th><th>Type</th><th>Hours</th></tr>";
               while($row = $resultSunday->fetch_assoc()){
                 echo "<tr><td>".$row["ProjName"]."</td><td>".$row["AllocType"]."</td><td>".$row["Hours"]."</td></tr>";
               }
                echo "</table>";
            }else{
                echo "No tasks";
            }$conn-> close();
                   ?></li>
                  
                </ul>      
            </div><?php
        }
    ?>

</body>

</html>
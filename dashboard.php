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
        if($_SESSION["type"] == "m"){ ?>
        	<div id="welcomeBox"> 
        		<h2 id="Welcome">Welcome to your dashboard, <?php echo $_SESSION["fName"] ?> <?php echo$_SESSION["lName"]?></h2>
       			<a href="./settings.php">settings</a>
    		</div>

    		<div id="options">
        		<button onclick="javascript:location.href='dashboard.php'">Home</button>
        		<button onclick="javascript:location.href='ManagerReport.php'">Request work report</button>
        		<button onclick="javascript:location.href='viewProject.php'">View projects</button>
        		<button>View employees</button>
        		<button>Add work allocation</button>
    		</div>

    		<div id="mainView">
                <div class="month"> 
                  <ul>
                    <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li>
                    <li>August<br><span style="font-size:18px">2017</span></li>
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
                  <li>1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                  <li>6</li>
                  <li>7</li>
                  <li>8</li>
                  <li>9</li>
                  <li><span class="active">10</span></li>
                  <li>11</li>
                  ...etc
                </ul>      
            </div>
    		<?php
        }else{ ?>
        	<div id="welcomeBox"> 
        		<h2 id="Welcome">Welcome to your dashboard, names</h2>
        		<a href="./settings.php">settings</a>
    		</div>

    		<div id="options">
    			<button onclick="javascript:location.href='dashboard.php'">Home</button>
        		<button onclick="javascript:location.href='ManagerReport.php'">Request work report</button>
    		</div>

    		<div id="mainView">
                <div class="month"> 
                  <ul>
                    <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li>
                    <li>August<br><span style="font-size:18px">2017</span></li>
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
                  <li>1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                  <li>6</li>
                  <li>7</li>
                  <li>8</li>
                  <li>9</li>
                  <li><span class="active">10</span></li>
                  <li>11</li>
                  ...etc
                </ul>      
            </div><?php
        }
    ?>

</body>

</html>
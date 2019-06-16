
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
        
        if($_SESSION["type"] == "manager"){ ?>
        	<div id="welcomeBox"> 
        		<h2 id="Welcome">Welcome to your dashboard, names</h2>
       			<a href="./settings.php">settings</a>
    		</div>

    		<div id="options">
        		<button onclick="javascript:location.href='dashboard.php'">Home</button>
        		<button onclick="javascript:location.href='ManagerReport.php'">Request work report</button>
        		<button>Add project</button>
        		<button>Add employee</button>
        		<button>Add work allocation</button>
    		</div>

    		<div id="mainView"></div>
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

    		<div id="mainView"></div><?php
        }
    ?>

</body>

</html>
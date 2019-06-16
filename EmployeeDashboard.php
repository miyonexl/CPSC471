
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
	<?php 
        
        echo "Session username is ".$_SESSION["username"];

    ?>
    <div id="welcomeBox"> 
        <h2 id="Welcome">Welcome to your dashboard, names</h2>
        <a href="./settings.php">settings</a>
    </div>

    <div id="options"></div>

    <div id="mainView"></div>

</body>

</html>
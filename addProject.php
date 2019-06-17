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


    <div class="welcomeBox"> 
        <h2 class="Welcome">Add Projects:</h2>
        <a href="./settings.php">settings</a>
    </div>

    <div class="mainView">
        <form action="updateProject.php" method="post">
            <label for="pname"><b>Project Name</b></label>
            <input id="prjName" type="text" placeholder="Project name (required)" name="pname" required>

            <label for="pnum"><b>Project Number</b></label>
            <input id="prjNum" type="text" placeholder="Project number (required)" name="pnum" required>

            <label for="req"><b>Requirements</b></label>
            <input id="prjReq" type="text" placeholder="Requirements" name="req">

            <label for="desc"><b>Description</b></label>
            <input id="prjDesc" type="text" placeholder="Project name (required)" name="desc">

            <label for="pType"><b>Project Type</b></label>
            <input id="prjType" type="text" placeholder="Project type code (required)" name="pType" required>

            <input type="hidden" name="updatePrj" value="0">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Projects</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>

    <div class="welcomeBox"> 
        <h2 class="Welcome">Edit Projects:</h2>
        <a href="./settings.php">settings</a>
    </div>

    <div class="mainView">
        <form action="updateProject.php" method="post">
            <label for="pname"><b>Project Name</b></label>
            <input id="prjName" type="text" placeholder="Project name (required)" name="pname" required>

            <label for="req"><b>New Requirements</b></label>
            <input id="prjReq" type="text" placeholder="Requirements" name="req">

            <label for="desc"><b>New Description</b></label>
            <input id="prjDesc" type="text" placeholder="Project name (required)" name="desc">

            <label for="pType"><b>New Project Type</b></label>
            <input id="prjType" type="text" placeholder="Project type code (required)" name="pType" required>

            <input type="hidden" name="updatePrj" value="1">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Delete Project</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>

    <div class="welcomeBox"> 
        <h2 class="Welcome">Delete Projects:</h2>
        <a href="#" onclick="goBack()">Go back</a>
    </div>

    <div class="mainView">
        <form action="updateProject.php" method="post">
            <label for="pname"><b>Project Name</b></label>
            <input id="prjName" type="text" placeholder="Project name (required)" name="pname" required>

            <input type="hidden" name="updatePrj" value="2">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
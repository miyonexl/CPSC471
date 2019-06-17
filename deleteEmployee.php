<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Delete Employee</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>

    <div class="welcomeBox"> 
        <h2 class="Welcome">Delete Employee:</h2>
        <a href=".#" onclick="goBack()">Go back</a>
    </div>

    <div class="mainView">
        <form action="updateEmployee.php" method="post">
            <label for="eId"><b>Employee ID</b></label>
            <input type="text" placeholder="Employee ID (required)" name="eId" required>

            <input type="hidden" name="updateEmp" value="2">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
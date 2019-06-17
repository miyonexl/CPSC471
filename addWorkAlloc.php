<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Add Work Allocation</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>

    <div class="welcomeBox"> 
        <h2 class="Welcome">Add Work Allocation:</h2>
        <a href="#" onclick="goBack()">Go back</a>
    </div>

    <div class="mainView">
        <form action="updateWorkAlloc.php" method="post">
            <label for="pname"><b>Project Name</b></label>
            <input type="text" placeholder="Project name (required)" name="pname" required>

            <label for="eId"><b>Employee ID</b></label>
            <input type="text" placeholder="Employee ID (required)" name="eId" required>

            <label for="date"><b>Date</b></label>
            <input type="date" name="date" required>

            <label for="aType"><br><b>Allocation type</b></label>
            <input type="text" placeholder="h/t/w (required)" name="aType" required>

            <label for="task"><b>Task</b></label>
            <input type="text" placeholder="Task description" name="task">

            <label for="hours"><b>Hours</b></label>
            <input type="text" placeholder="Number of hours" name="hours">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
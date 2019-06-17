<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Add Employee</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>


    <div class="welcomeBox"> 
        <h2 class="Welcome">Add Employee:</h2>
        <a href="./settings.php">settings</a>
    </div>

    <div class="mainView">
        <form action="updateEmployee.php" method="post">
            <label for="eId"><b>Employee ID</b></label>
            <input type="text" placeholder="Employee ID (required)" name="eId" required>

            <label for="fName"><b>First Name</b></label>
            <input type="text" placeholder="First name (required)" name="fName" required>

            <label for="mName"><b>Middle Name</b></label>
            <input type="text" placeholder="Middle name" name="mName">

            <label for="lName"><b>Last Name</b></label>
            <input type="text" placeholder="Last name (required)" name="lName" required>

            <label for="uType"><b>User Type</b></label>
            <input type="text" placeholder="User type (required)" name="uType" required>

            <label for="psw"><b>Password</b></label>
            <input type="text" placeholder="Password (required)" name="psw" required>

            <input type="hidden" name="updateEmp" value="0">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
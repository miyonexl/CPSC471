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
            <input type="text" placeholder="First name" name="fName">

            <label for="mName"><b>Middle Name</b></label>
            <input type="text" placeholder="Middle name" name="mName">

            <label for="lName"><b>Last Name</b></label>
            <input type="text" placeholder="Last name" name="lName">

            <label for="uType"><b>User Type</b></label>
            <input type="text" placeholder="User type " name="uType">

            <label for="sal"><b>Salary</b></label>
            <input type="text" placeholder="Salary" name="sal">

            <label for="dept"><b>Department</b></label>
            <input type="text" placeholder="Department" name="dept">

            <input type="hidden" name="updateEmp" value="1">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
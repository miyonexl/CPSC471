<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Settings</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>

    <div class="welcomeBox"> 
        <h2 class="Welcome">Change Password:</h2>
        <a href="#" onclick="goBack()">Go back</a>
    </div>

    <div class="mainView">
        <form action="updatePassword.php" method="post">
            <label for="cPsw"><b>Current Password</b></label>
            <input type="text" placeholder="Current Password (required)" name="cPsw" required>

            <label for="nPsw"><b>New Password</b></label>
            <input type="text" placeholder="New Password" name="nPsw" required>

            <label for="nPsw2"><b>Comfirm Password</b></label>
            <input type="text" placeholder="New Password" name="nPsw2" required>

            <?php if($_GET["Message"] != null){
                $msg = $_GET["Message"];
                echo "<label class='warning'>".$msg."</label>";
            }
            ?>

            <button>Submit</button>
        </form>
    </div>

</body>

</html>
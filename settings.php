<!DOCTYPE html>
<html>

<head>
    <title>Account Settings</title>

    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>
    <div id="welcomeBox"> 
        <h2 id="Welcome">Account Settings</h2>
        <a href="#" onclick="goBack()">Go back</a>
    </div>

    <div id="options">
        <button onclick="javascript:location.href='changePassword.php'"">Change Password</button>
        <button onclick="javascript:location.href='endSession.php'"">Sign Out</button>        
    </div>

    <div id="mainView"></div>

</body>

</html>
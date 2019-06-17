<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php

        if($_GET['button1']){fun1();}

        if($_GET['button2']){fun2();}

        if($_GET['button3']){fun3();}        

        function fun1(){
            $_SESSION["rType"] = "C";
            header("Location: dateSpecifier.php");
        }

        function fun2(){
            $_SESSION["rType"] = "D";
            header("Location: dateSpecifier.php");
        }

        function fun3(){
            $_SESSION["rType"] = "I";
            header("Location: dateSpecifier.php");
        }
    ?>

    <script>
        function goBack(){
            window.history.go(-1);
        }
    </script>

    <div id="welcomeBox"> 
        <h2 id="Welcome">Reports</h2>
        <a href="#" onclick="goBack()">Go back</a>
    </div>

    <div id="options">
        <button onClick='location.href="?button1=1"'>Company Report</button>
        <button onClick='location.href="?button2=1"'>Departmental Report</button>
        <button onClick='location.href="?button3=1"'>Individual Report</button>
    </div>

</body>

</html>
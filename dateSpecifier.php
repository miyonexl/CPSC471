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
    <div id="welcomeBox"> 
        <h2 id="Welcome">Reports</h2>
        <a href="./settings.php">settings</a>
    </div>
    <?php 
        $test = "testing";
    ?>

    <div id="mainView">
       <?php if($_SESSION["rType"] == "C"){ ?>
        <form action="CReport.php" method="post">
            Start date:<input type="date" name="startDate">
            End date:<input type="date" name="endDate">
            <button>Submit</button>
        </form> <?php }else if($_SESSION["rType"] == "D"){ ?>
        <form action="deptSpecifier.php" method="post">
            Start date:<input type="date" name="startDate">
            End date:<input type="date" name="endDate">
            <input type="hidden" name="test" value="<?php echo $test;?>"> 
            <button>Submit</button>
        </form> <?php }else if($_SESSION["rType"] == "I"){ ?>
        <form action="deptSpecifier.php" method="post">
            Start date: <input type="date" name="startDate">
            End date: <input type="date" name="endDate">
            <button>Submit</button>
        </form> <?php } ?>
           
    </div>


</body>

</html>
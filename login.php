<!DOCTYPE html>
<html>
  <head>
    <title>Intergraph</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>
    <div class="container">
    <form action="validate.php" method="post">
        <label for="uname"><b>Username</b></label>
        <input id="username" type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input id="password" type="text" placeholder="Enter Password" name="psw" required>

        <?php 
          if($_GET["Message"] != null){
            $msg = $_GET["Message"];
            echo "<label class='warning'>".$msg."</label>";
          }
        ?>

        <button id="login">Login</button>
    </form>
    </div>
    
  </body>
</html>

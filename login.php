<!DOCTYPE html>
<html>
  <head>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    
  </head>

  <body>

    <form action="validate.php" method="post">
        <label for="uname"><b>Username</b></label>
        <input id="username" type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input id="password" type="password" placeholder="Enter Password" name="psw" required>

        <button id="login">Login</button>
    </form>

    
  </body>
</html>

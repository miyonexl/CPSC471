<!DOCTYPE html>
<html>
  <head>
    <title>Intergraph</title>
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

<<<<<<< HEAD
    
=======
    <?php
      $servername = "localhost:3308";          // update this to whatever yours is
      $username = "root";                 //same here
      $password = "admin";        //your localhost password
      //$db = "test";                    //your database name
      
      $conn = new mysqli($servername, $username, $password); //$db);
      
      if($conn->connect_error){
          die("Connection failed ".$conn->connect_error);
      }




      if(isset($_GET['Message'])){
        echo "<script type='text/javascript'>alert('Wrong Username or Password');</script>";
      }
      $conn-> close();
    ?>   
>>>>>>> master
  </body>
</html>

<?php
if( $_SERVER['REQUEST_METHOD']=='POST'){
  require("mysqli_connect.php");   
         
        $username = mysqli_real_escape_string($dbc,$_POST['username']);
        $password = mysqli_real_escape_string($dbc,$_POST['password']);      
        
          $q = "select * from login where username= '$username' and password = '$password'";
          $r = mysqli_query($dbc, $q); 
    
    if(mysqli_affected_rows($dbc) == 1){        
        $r1 = mysqli_fetch_array($r);        
        session_start();        
        header("Location: home.php");        
    }        
    else{
        echo "invalid information";
    }     
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel = "stylesheet" type = "text/css" href="style/style.css">
    </head>
    <body>
        <h2 style="text-align: center;">Login</h2>
        <div class = "login-form">
        <form action="index.php" method="post">
        <label>
            Username:
        </label><br>
        <input type="text" name="username">
        <label><br>
            Password:
        </label><br>
        <input type="password" name="password"><br>        
        <input type="Submit" class = "btnsubmit" value = "login">        
        </form>
        </div>        
    </body>    
</html>
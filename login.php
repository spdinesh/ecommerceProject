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
        $_SESSION['login'] = 'true';        
        header("Location: home.php");
        exit;        
    }        
    else{
        echo "invalid information";
    }     
}
?>
<?php
session_start();

if($_SESSION['login']){
    echo "welcome to your account";
   header("home.html"); 
}
else{
   header("index.html"); 
}
exit;
?>
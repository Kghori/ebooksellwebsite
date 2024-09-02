<?php
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message']="<p class='text-center validation-red'>Please login to access admin panel !!</p>";
        header("location:login.php");  
    }
?>
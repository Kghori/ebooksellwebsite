<?php
    if(!isset($_SESSION['userlogin']))
    {
        $_SESSION['login-message']="<p class='text-center validation-red'>Please login to access panel !!</p>";
        header("location:userlogin.php");  
    }
?>
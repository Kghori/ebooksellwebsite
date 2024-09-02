<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');
    session_destroy();
    echo "<script>window.location='login.php';</script>";
?>
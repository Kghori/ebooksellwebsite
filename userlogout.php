<?php
    include('.\assets\conn\dbconnection.php');
    session_destroy();
    echo "<script>window.location='userlogin.php';</script>";
?>
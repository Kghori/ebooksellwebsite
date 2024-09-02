<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">-->
  <link rel="stylesheet" href="..\assets\flickity\flickity.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="..\assets\font\fontawesome-free-6.2.0-web\css\all.css">
  <link rel="stylesheet" href="..\assets\Bootstrap\css\bootstrap.min.css">
  <link rel="website icon" type="png" href="../assets/img/websiteicon.png">
  <link rel="stylesheet" href="..\assets\css\s4.css">
  <title>Admin Panel</title>
</head>

<body>


<section>
        <div class="container mt-5">

            <div class="row justify-content-center mt-5">
                <div class="col-lg-4 col-md-6 col-12 mt-5">
       
                        <h4 class="signuptitle1">Welcome,</h4>
                        <h4 class="signuptitle">Admin Panel Login</h4>
    
                        <p class="signinmsg mt-2">Be the fastest in delivering Grocery Items.</p>
                        <?php
                            if(isset($_SESSION['login']))
                            {
                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }

                            if(isset( $_SESSION['no-login-message']))
                            {
                                echo  $_SESSION['no-login-message'];
                                unset( $_SESSION['no-login-message']);
                            }
                        ?>
                        <form action="" method="POST">
                   
                            <div class="form-group mt-3">
                                <input type="email" class="form-control shadow-sm p-2" placeholder="Email Address" id="user" name="t1" required>
                            </div>
    
                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm p-2" placeholder="Password" id="user" name="t2" required>
                            </div>

                            <div class="form-group mt-4">
                                <input type="submit" class="form-control shadow-sm p-2" value="Sign In" id="signupbtn" name="s1">

                            </div>
                        </form>
    
                </div>
            </div>
            

        </div>
    </section>

</body>

</html>

<?php

if(isset($_POST['s1']))
{
    $email=$_POST['t1'];
    $pass=$_POST['t2'];

    $query="select * from admin where email='$email' AND password='$pass'";
    $run=mysqli_query($conn,$query);

    if($run)
    {
        $count=mysqli_num_rows($run);
        if($count==1)
        {
            echo "<script>window.location='index.php';</script>";
            $_SESSION['login']="<p class='validation-green'>Wow !! Login Successfully</p>";
            $_SESSION['user']=$email;
        }
        else
        {
            echo "<script>window.location='login.php';</script>";
            $_SESSION['login']="<p class='text-center validation-red'>Sorry !! Username or Password has been incorrected.</p>";
        }

    }
}
        
?>
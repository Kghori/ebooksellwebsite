<?php
    include('.\assets\conn\dbconnection.php');
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="./assets/img/websiteicon.png">
    <link rel="stylesheet" href=".\assets\Bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href=".\assets\css\d4.css">
    <title>usersignin</title>
</head>

<body>

    <section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;">
                                <p class="text-primary">Home</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-4 col-md-6 col-sm-8">
                        <h4 class="signuptitle">Sign In</h4>
    
                        <p class="signinmsg mt-2">Be the fastest in delivering Grocery Items.</p>
                        <?php
                                if(isset($_SESSION['add']))
                                {
                                    echo $_SESSION['add'];
                                    unset($_SESSION['add']);
                                }
                                if(isset($_SESSION['login']))
                                {
                                    echo $_SESSION['login'];
                                    unset($_SESSION['login']);
                                }
                                if(isset($_SESSION['login-message']))
                                {
                                    echo $_SESSION['login-message'];
                                    unset($_SESSION['login-message']);
                                }
                        ?>
                        <form action="" method="POST">
                   
                            <div class="form-group mt-3">
                                <input type="email" class="form-control shadow-sm" placeholder="Email Address" id="user" name="t1" required>
                            </div>
    
                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm" placeholder="Password" id="user" name="t2" required>
                            </div>

                            <div class="form-group mt-4">
                                <input type="submit" class="form-control shadow-sm" value="Sign In" id="signupbtn" name="s1">

                            </div>
                            <p class="signinmsg mt-3">Don't have an account ? <a href="userregister.php" style="text-decoration: none;">Create account</a></p>
                        </form>
                </div>
            </div>
            
        </div>
    </section>

    <div class="ftr mt-5">
        <div class="container">
            <div class="copyright p-4">
           <strong><span class="text-primary">Bigstore</span></strong> <br>
                Designed & Developed by chetan & Ankit
            </div>
        </div>
    </div>

</body>
</html>

<?php

if(isset($_POST['s1']))
{
    $email=$_POST['t1'];
    $pass=$_POST['t2'];

    $query="select * from customer where email='$email' AND password='$pass'";
    $run=mysqli_query($conn,$query);

    if($run)
    {
        $count=mysqli_num_rows($run);
        if($count>0)
        {
            $result=mysqli_fetch_assoc($run);
            $_SESSION['fullname']=$result['fullname'];
            $_SESSION['id']=$result['id'];
            $_SESSION['userlogin']=$email;
            header("location:cindex.php");
        }
        else
        {
            echo "<script>window.location='userlogin.php';</script>";
            $_SESSION['login']="<p class='text-center validation-red'>Sorry!! Username or Password has been incorrected.</p>";
        }

    }
}
        
?>
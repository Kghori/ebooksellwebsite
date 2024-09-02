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
    <title>usersignup</title>
</head>

<body>

    <section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" style="text-decoration:none;">
                                <p class="text-primary">Home</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Account</li>
                    </ol>
                </nav>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-4 col-md-6 col-12">
       
                     
                        <h4 class="signuptitle">Create Account</h4>
    
                        <p class="signinmsg mt-2">Be the fastest in delivering Grocery Items.</p>
                        <?php
                                if(isset($_SESSION['pass-not-match']))
                                {
                                    echo $_SESSION['pass-not-match'];
                                    unset($_SESSION['pass-not-match']);
                                }
                                if(isset($_SESSION['validation']))
                                {
                                    echo $_SESSION['validation'];
                                    unset($_SESSION['validation']);
                                }
                     
                        ?>
                        <form action="" method="POST" onSubmit="return validateform()" name="frmuserreg" > 

                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="Full Name" id="user" name="t1">
                            </div>
                   
                            <div class="form-group mt-3">
                                <input type="email" class="form-control shadow-sm" placeholder="Email Address" id="user" name="t2">
                            </div>
    
                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm" placeholder="Password" id="user" name="t3">
                            </div>


                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm" placeholder="Confirm Password" id="user" name="t4">
                            </div>

                            <div class="form-group mt-4">
                                <input type="submit" class="form-control shadow-sm" value="Create account" id="signupbtn" name="s1">

                            </div>
                            <p class="signinmsg mt-3">Already have an account ? <a href="userlogin.php" style="text-decoration: none;">Sign In</a></p>
                        </form>
    
                </div>
            </div>
            
        </div>
    </section>

    <div class="ftr mt-5">
        <div class="container">
            <div class="copyright p-4">
           <strong><span class="text-primary">Bigstore</span></strong><br>
                Designed & Developed by chetan & Ankit
            </div>
        </div>
    </div>

</body>
</html>

<?php
        if(isset($_POST['s1']))
        {
            $fullname=$_POST['t1'];
            $email=$_POST['t2'];
            $pass=$_POST['t3'];
            $cpass=$_POST['t4'];
 
            if($pass==$cpass)
            {
                $query="select * from customer where email='$email'";
                $run=mysqli_query($conn,$query);

                if(!$run->num_rows>0)
                {
                    $query="insert into customer(fullname,email,password) values('$fullname','$email','$pass')";
                    $run=mysqli_query($conn,$query);
                if($run)
                {
                    echo "<script>window.location='userlogin.php';</script>";
                  $_SESSION['add']="<p class='validation-green text-center'>wow !! Your account created successfully</p>";
                }
                }
                else
                {
                    echo "<script>window.location='userregister.php';</script>";
                  $_SESSION['pass-not-match']="<p class='text-center validation-red'>Woops! Email Already Exists.</p>";
                }
                
            }
            else
            {
                echo "<script>window.location='userregister.php';</script>";
              $_SESSION['pass-not-match']="<p class='text-center validation-red'>'Woops!! Confirm Password Not Match.</p>";
            }
        }
?>


<script type="application/javascript">

    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
    var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

    function validateform()
    {
        if(document.frmuserreg.t1.value == "")
        {
            alert("Fullname should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(!document.frmuserreg.t1.value.match(alphaspaceExp))
        {
            alert("Fullname should be in character.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t2.value == "")
        {
            alert("Email address should not be empty.!");
            document.frmuserreg.t2.focus();
            return false;
        }
        else if(!document.frmuserreg.t2.value.match(emailExp))
        {
            alert("Email invalid.!");
            document.frmuserreg.t2.focus();
            return false;
        }
        else if(document.frmuserreg.t3.value == "")
        {
            alert("Password should not be empty.!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(document.frmuserreg.t4.value == "")
        {
            alert("Confirm Password should not be empty.!");
            document.frmuserreg.t4.focus();
            return false;
        }
        else if(document.frmuserreg.t3.value.length < 8)
        {
            alert("Password length should be more than 8 characters...");
            document.frmuserreg.t3.focus();
            return false;
        }
    }
</script>
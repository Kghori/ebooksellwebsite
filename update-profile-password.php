<?php  include('.\partials\menu.php');  ?>

<?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
?>

<section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="myaccount.php" style="text-decoration:none;">
                                <p class="text-danger">My Account</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 col-12">
                 
                        <h4 class="signuptitle">Change Password</h4>

                        <form action="" method="POST"  onSubmit="return validateform()" name="frmuserreg" >

                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm" placeholder="Current Password" id="user" name="t1">
                            </div>
    
                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm" placeholder="New Password" id="user" name="t2">
                            </div>

                            <div class="form-group mt-3">
                                <input type="password" class="form-control shadow-sm" placeholder="Confirm New Password" id="user" name="t3">
                            </div>
                           
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="form-group mt-4">
                                <input type="submit" class="form-control shadow-sm" value="Update Password" id="signupbtn" name="s1">

                            </div>
                        </form>
                
                </div>
            </div>
            

        </div>
    </section>

    <?php   include('.\partials\footer.php');  ?> 

    <?php
        if(isset($_POST['s1']))
        {
            $id=$_POST['id'];
            $cp=$_POST['t1'];
            $np=$_POST['t2'];
            $cmp=$_POST['t3'];
        
            $query="select * from customer where id='$id' AND password='$cp'";
            $run=mysqli_query($conn,$query);
            if($run)
            {
                $count=mysqli_num_rows($run);

                if($count==1)
                {
                    if($np==$cmp)
                    {
                            $query2="update customer set password='$np' where id='$id'";
                            $run2=mysqli_query($conn,$query2);
                            if($run2==TRUE)
                            {
                                echo "<script>window.location='myaccount.php';</script>";
                                $_SESSION['pass-change']="<p class='validation-green'>Wow !! Your password has been changed.</p>";
                            }
                    }
                    else
                    {
                        echo "<script>window.location='myaccount.php';</script>";
                    $_SESSION['confirm-not-match']="<p class='validation-red'> Sorry !! Confirm Password Not Matched please Try again !</p>";
                    }
                }
                else
                {
                    echo "<script>window.location='myaccount.php';</script>";
                    $_SESSION['current']="<p class='validation-red'> Sorry !! current password has been incorrected please Try again !</p>";
                }
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
            alert("Current password should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t2.value == "")
        {
            alert("New password should not be empty.!");
            document.frmuserreg.t2.focus();
            return false;
        }
        else if(document.frmuserreg.t3.value == "")
        {
            alert("Confirm New password should not be empty.!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(document.frmuserreg.t2.value.length < 8)
        {
            alert("Password length should be more than 8 characters...");
            document.frmuserreg.t2.focus();
            return false;
        }
    }
</script>
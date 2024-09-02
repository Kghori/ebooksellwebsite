<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<?php

    $id=$_GET['id'];

    $query="select * from admin where id='$id'";
    $run=mysqli_query($conn,$query);
    if($run==TRUE)
    {
        $count=mysqli_num_rows($run);

        if($count==1)
        {
            $result=mysqli_fetch_assoc($run);

            $fn=$result['fullname'];
            $email=$result['email'];
        }
    }
?>

<section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="..\admin\manage-admin.php" style="text-decoration:none;">
                                <p class="text-danger">Manage Admin</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Admin</li>
                    </ol>
                </nav>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
             
                        <h4 class="signuptitle">Update Admin</h4>
    
                        <p class="signinmsg mt-2">Change Your Admin Details.</p>
                        <form action="" method="POST" onSubmit="return validateform()" name="frmuserreg">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="Full Name" id="user" value="<?php echo $fn;  ?>" name="t1">
                            </div>

                            <div class="form-group mt-3">
                                <input type="email" class="form-control shadow-sm" placeholder="Email Address" id="user" value="<?php echo $email;  ?>" name="t2">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group mt-4">
                                <input type="submit" class="form-control shadow-sm" value="Update Admin" id="signupbtn" name="s1">

                            </div>
                        </form>
                 
                </div>
            </div>
            

        </div>
    </section>


<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>

<?php

        if(isset($_POST['s1']))
        {
              $id=$_POST['id'];
                $fn=$_POST['t1'];
                $e1=$_POST['t2'];

                $query="update admin set fullname='$fn' , email='$e1' where id='$id' ";
                $run=mysqli_query($conn,$query);

                if($run==true)
                {
                    echo "<script>window.location='manage-admin.php';</script>";
                  $_SESSION['add']="<p class='validation-green'>wow!! Admin update successfully</p>";
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
    }
</script>


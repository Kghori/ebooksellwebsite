<?php  include('.\partials\menu.php');  ?>



<section>
        <div class="container">
                <div class="row justify-content-center mb-5 mt-5">
                <div class="stronghold-heading1">
                <div class="heading-subtitle1">
                    <span class="heading-sep-front1"></span>
                    <span class="heading-subtitle-span1">Account Information</span>
                    <span class="heading-sep-front1"></span>
                </div>
            </div>
                        <div class="col-md-5 mt-5">
                            <?php
                                    if(isset($_SESSION['edit']))
                                    {
                                        echo $_SESSION['edit'];
                                        unset($_SESSION['edit']);
                                    }
                                    if(isset($_SESSION['pass-change']))
                                    {
                                        echo $_SESSION['pass-change'];
                                        unset($_SESSION['pass-change']);
                                    }
                                    if(isset($_SESSION['confirm-not-match']))
                                    {
                                        echo $_SESSION['confirm-not-match'];
                                        unset($_SESSION['confirm-not-match']);
                                    }
                                    if(isset($_SESSION['current']))
                                    {
                                        echo $_SESSION['current'];
                                        unset($_SESSION['current']);
                                    }
                            ?>
                                <?php
                                           $user_id=$_SESSION['id'];            
                                           $query="select * from customer where id='$user_id'";
                                           $run=mysqli_query($conn,$query);
                                           if($run==true)
                                           {
                                            $count=mysqli_num_rows($run);
                                            if($count==1)
                                            {
                                                while($result=mysqli_fetch_assoc($run))
                                                {
                                                    $id=$result['id'];
                                                    $fullname=$result['fullname'];
                                                    $email=$result['email'];
                                                    ?>
<form action="" method="POST">
                                        <div class="profile-header">Fullname</div>
                                        <div class="profile-text"><?php echo $fullname; ?></div>

                                        <div class="profile-header">Email</div>
                                        <div class="profile-text"><?php echo $email; ?></div>

                                        <a href="update-profile.php?id=<?php echo $id; ?>" class="btn btn-danger">Edit Profile</a>
                                        <a href="update-profile-password.php?id=<?php echo $id; ?>" class="btn btn-primary mx-2">Change Password</a>
                                </form>
                                                    <?php
                                                }
                                            }
                                           }
                                ?>
                        </div>
                </div>
        </div>
</section>


<?php   include('.\partials\footer.php');  ?>
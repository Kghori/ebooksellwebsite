<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="manage-sub_category.php" style="text-decoration:none;">
                                <p class="text-danger">Manage Sub Category</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
                    </ol>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
       
                        <h4 class="signuptitle1">Welcome,</h4>
                        <h4 class="signuptitle">Add Sub Category</h4>
    
                        <p class="signinmsg mt-2">Add Your Product Sub Category.</p>

                        <form action="" method="POST" onSubmit="return validateform()" name="frmuserreg" >
                      
                        <div class="form-group">
                        <p class="card-text">Select Category:</p> 
                                    <select class="form-select" id="user" name="category">
                                        <?php
                            $query="select * from category where active='yes'";
                            $run=mysqli_query($conn,$query);

                            $count=mysqli_num_rows($run);
                            if($count>0)
                            {
                                while($result=mysqli_fetch_assoc($run))
                                {
                                    $cid=$result['category_id'];
                                    $c_name=$result['category_name'];

                                    ?>
                                      <option value="<?php echo $cid; ?>"><?php echo $c_name; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                        <option value="0">No Category Available !!</option>
                                <?php
                            }
                                        ?>
                                    </select>
                        </div>

                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="Sub Category Name" id="user" name="t1">
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-group d-flex mt-2">
                                    <p> <b>Active :</b></p>
                                    <input type="radio" class="form-check-input mx-2" name="t3" value="Yes" required>Yes
                                    <input type="radio" class="form-check-input mx-2" name="t3" value="No" required>No
                                    </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="t2" value="<?php echo $id; ?>">
                                <input type="submit" class="form-control shadow-sm" value="Add Sub Category" id="signupbtn" name="s1">
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
                $sub_category_name=$_POST['t1'];
                $category_id=$_POST['category'];
             
                if(isset($_POST['t3']))
                {
                   $active=$_POST['t3'];
                }
                else
                {
                    $active="No";
                }

                $query="insert into sub_category(category_id,sub_category_name,active) values('$category_id','$sub_category_name','$active');";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    echo "<script>window.location='manage-sub_category.php';</script>";
                    $_SESSION['add']="<p class='validation-green'>wow!! Sub Category Added successfully</p>";
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
            alert("Sub category name should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(!document.frmuserreg.t1.value.match(alphaspaceExp))
        {
            alert("Sub category name should be in character.!");
            document.frmuserreg.t1.focus();
            return false;
        }
    }
</script>
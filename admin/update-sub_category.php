<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>


<?php
        if(isset($_GET['scategory_id']))
        {
                $id=$_GET['scategory_id'];

                $query="select * from sub_category where scategory_id='$id'";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    $count=mysqli_num_rows($run);
                    if($count==1)
                    {
                            $result=mysqli_fetch_assoc($run);
                            $id1=$result['scategory_id'];
                            $category_id1=$result['category_id'];
                            $sub_category_name1=$result['sub_category_name'];
                            $active=$result['active'];
                    }
                }
        }
        else
        {
            echo "<script>window.location='manage-sub_category.php';</script>";
        }
?>


<section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="manage-sub_category.php" style="text-decoration:none;">
                                <p class="text-danger">Manage Sub Category</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Sub-Category</li>
                    </ol>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
       
                        <h4 class="signuptitle1">Welcome,</h4>
                        <h4 class="signuptitle">Update Sub Category</h4>
    
                        <p class="signinmsg mt-2">Update Your Product Sub Category.</p>

                        <form action="" method="POST"  onSubmit="return validateform()" name="frmuserreg">
                      
                        <div class="form-group mt-3">
                                <p>Select Category:</p> 
                                    <select class="form-select" id="user" name="category">
                                        <?php
                                                $query="select * from category where active='Yes'";
                                                $run=mysqli_query($conn,$query);
                                                if($run==true)
                                                {
                                                    $count=mysqli_num_rows($run);
                                                    if($count>0)
                                                    {
                                                      while($result=mysqli_fetch_assoc($run))
                                                      {
                                                        $category_id=$result['category_id'];
                                                        $category_name=$result['category_name'];

                                                       ?>
                                                                    <option
                                                                <?php
                                                                        if($category_id1==$category_id)
                                                                        {
                                                                            echo "selected";
                                                                        }
                                                                ?>
                                                                    value='<?php echo $category_id; ?>'><?php  echo $category_name; ?></option>
                                                       <?php
                                                      }

                                                    }
                                                    else
                                                    {
                                                        ?>
                                                                <option value='0'>No Category Available !!</option>
                                                        <?php
                                                        
                                                    }
                                                }
                                        ?>
                                    </select>
                        </div>

                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="Sub Category Name" id="user" name="t4" value="<?php echo $sub_category_name1; ?>">
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-group d-flex mt-2">
                                    <p> <b>Active :</b></p>
                                    <input type="radio" class="form-check-input mx-2" name="t3" value="Yes" required
                                    <?php
                                            if($active=='Yes')
                                            {
                                                echo 'checked';
                                            }
                                    ?>  
                                    >Yes
                                    <input type="radio" class="form-check-input mx-2" name="t3" value="No" required
                                    <?php
                                            if($active=='No')
                                            {
                                                echo 'checked';
                                            }
                                    ?>  
                                    >No
                                    </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="t2" value="<?php echo $id1; ?>">
                                <input type="submit" class="form-control shadow-sm" value="Update Sub Category" id="signupbtn" name="s1">
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
            $id2=$_POST['t2'];
            $c1=$_POST['category'];
            $s1=$_POST['t4'];

            if(isset($_POST['t3']))
            {
               $active=$_POST['t3'];
            }
            else
            {
                $active="No";
            }

            $query2="update sub_category set category_id='$c1',sub_category_name='$s1',active='$active' where scategory_id='$id2'";
            $run2=mysqli_query($conn,$query2);
            if($run2==true)
            {
                echo "<script>window.location='manage-sub_category.php';</script>";
                $_SESSION['update']="<p class='validation-green'>Wow!! Sub category updated successfully</p>";
            }
            else
            {
                echo "<script>window.location='manage-sub_category.php';</script>";
                $_SESSION['update']="<p class='validation-red'>Failed !! to update sub category</p>";
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
        if(document.frmuserreg.t4.value == "")
        {
            alert("Sub category name should not be empty.!");
            document.frmuserreg.t4.focus();
            return false;
        }
        else if(!document.frmuserreg.t4.value.match(alphaspaceExp))
        {
            alert("Sub category name should be in character.!");
            document.frmuserreg.t4.focus();
            return false;
        }
    }
</script>
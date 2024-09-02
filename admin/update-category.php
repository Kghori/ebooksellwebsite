<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>


<?php

        if(isset($_GET['category_id']))
        {
                $id=$_GET['category_id'];

                $query="select * from category where category_id='$id'";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    $count=mysqli_num_rows($run);
                    if($count==1)
                    {
                            $result=mysqli_fetch_assoc($run);
                            $id1=$result['category_id'];
                            $name=$result['category_name'];
                            $cimage=$result['category_image'];
                            $disc=$result['discount'];
                            $active=$result['active'];
                    }
                }
        }
        else
        {
            echo "<script>window.location='manage-category.php';</script>";
        }

?>

<section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="manage-category.php" style="text-decoration:none;">
                                <p class="text-danger">Manage Category</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                    </ol>
                </nav>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
       
                        <h4 class="signuptitle">Update Category</h4>
    
                        <p class="signinmsg mt-2">Update Your Product Category.</p>
                        <form action="" method="POST" enctype="multipart/form-data" onSubmit="return validateform()" name="frmuserreg">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="Category Name" id="user" name="t1" value="<?php echo $name; ?>">
                            </div>

                            <div class="form-group mt-3">
                                <p class="card-text">Current Image:</p>
                                <?php
                                    if($cimage!="")
                                    {
                                        ?>
                                        <img src="../assets/img/category/<?php echo $cimage; ?>" width="60px" height="60px" class="img-fluid">
                                                <?php
                                    }
                                    else
                                    {
                                        echo "<p class='validation-red'>Image Not Added !!</p>";
                                    }
                                ?>
                                <input type="file" class="form-control shadow-sm mt-2" id="user" name="image">
                            </div>

                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="UP TO % OFF" id="user" name="t2" value="<?php echo $disc;  ?>">
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

                            <div class="form-group mt-4">
                                <input type="submit" class="form-control shadow-sm" value="Update Category" id="signupbtn" name="s1">
                                <input type="hidden" name="id" value="<?php echo $id1; ?>">
                                <input type="hidden" name="cimage" value="<?php echo $cimage; ?>">
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
            $id2=$_POST['id'];
            $name=$_POST['t1'];
            $image_name=$_POST['image'];
            $disc=$_POST['t2'];
          
            if(isset($_POST['t3']))
            {
                $active=$_POST['t3'];
            }
            else
            {
                $active='No';
            }

            if(isset($_FILES['image']['name']))
            {
                    $image_name=$_FILES['image']['name'];
                    if($image_name!="")
                    {
                            //upload image new image
                                     $ext=end(explode('.',$image_name));
                      //  rename the image
                   $image_name="category_image".rand(000,999).'.'.$ext;

                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path="../assets/img/category/".$image_name;

                        $upload=move_uploaded_file($source_path,$destination_path);
                        if($upload==false)
                        {
                            echo "<script>window.location='manage-category.php';</script>";
                            $_SESSION['upload']="<p class='validation-red text-center'>Failed !! to Upload Image</p>";
                            die();
                        }

                            //remove current image
                            if($cimage!="")
                            {
                                $path="../assets/img/category/".$cimage;
                                $remove=unlink($path);
                                if($remove==false)
                                {
                                    echo "<script>window.location='manage-category.php';</script>";
                                    $_SESSION['failed-remove']="<p class='validation-red'>Failed to remove category image</p>";
                                    die();
                                }
                            }
                    }
                    else
                    {
                        $image_name=$cimage; 
                    }

            }
            else
            {
                $image_name=$cimage;
            }

            $query2="update category set category_name='$name',category_image='$image_name',discount='$disc',active='$active' where category_id='$id2'";
            $run2=mysqli_query($conn,$query2);
            if($run2==true)
            {
                echo "<script>window.location='manage-category.php';</script>";
                $_SESSION['update']="<p class='validation-green'>Wow!! Category updated successfully</p>";
            }
            else
            {
                echo "<script>window.location='manage-category.php';</script>";
                $_SESSION['update']="<p class='validation-red'>Failed !! to update category</p>";
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
            alert("Category name should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(!document.frmuserreg.t1.value.match(alphaspaceExp))
        {
            alert("Category name should be in character.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t2.value == "")
        {
            alert("Discount should not be empty.!");
            document.frmuserreg.t2.focus();
            return false;
        }
        else if(!document.frmuserreg.t2.value.match(numericExpression))
        {
            alert("Please enter only number for dicount..!!");
            document.frmuserreg.t2.focus();
            return false;
        }
       
      
    }
</script>
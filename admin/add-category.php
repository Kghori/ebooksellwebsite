<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<section>
        <div class="container mt-5">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="manage-category.php" style="text-decoration:none;">
                                <p class="text-danger">Manage Category</p>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
       
                        <h4 class="signuptitle1">Welcome,</h4>
                        <h4 class="signuptitle">Add Category</h4>
    
                        <p class="signinmsg mt-2">Add Your Product Category.</p>
                        <?php
                        if(isset($_SESSION['upload']))
                        {
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                ?>
                        <form action="" method="POST" enctype="multipart/form-data" onSubmit="return validateform()" name="frmuserreg" >
                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="Category Name" id="user" name="t1">
                            </div>

                            <div class="form-group mt-3">
                                <input type="file" class="form-control shadow-sm" id="user" name="image">
                            </div>

                            <div class="form-group mt-3">
                                <input type="text" class="form-control shadow-sm" placeholder="UP TO % OFF" id="user" name="t2">
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-group d-flex mt-2">
                                    <p> <b>Active :</b></p>
                                    <input type="radio" class="form-check-input mx-2" name="t3" value="Yes" required>Yes
                                    <input type="radio" class="form-check-input mx-2" name="t3" value="No" required>No
                                    </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="form-control shadow-sm" value="Add Category" id="signupbtn" name="s1">
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
                $name=$_POST['t1'];
                $disc=$_POST['t2'];

                if(isset($_POST['t3']))
                {
                   $active=$_POST['t3'];
                }
                else
                {
                    $active="No";
                }

              //  print_r($_FILES['image']);
              //  die();

              if(isset($_FILES['image']['name']))
              {
                        //upload image
                        $image_name=$_FILES['image']['name'];

                        if($image_name!="")
                        {
                                  $ext=end(explode('.',$image_name));
                        //rename the image
                      $image_name="category_image".rand(000,999).'.'.$ext;

                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path="../assets/img/category/".$image_name;

                        $upload=move_uploaded_file($source_path,$destination_path);
                        if($upload==false)
                        {
                            echo "<script>window.location='add-category.php';</script>";
                            $_SESSION['upload']="<p class='validation-red text-center'>Failed !! to Upload Image</p>";
                            die();
                        }
                        }
              }
              else
              {
                    //don't upload image
                    $image_name="";
              }

                $query="insert into category(category_name,category_image,discount,active) values('$name','$image_name','$disc','$active');";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    echo "<script>window.location='manage-category.php';</script>";
                    $_SESSION['add']="<p class='validation-green'>wow!! Category Added successfully</p>";
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
        else if(document.frmuserreg.image.value == "")
        {
            alert("Please select category image.!");
            document.frmuserreg.image.focus();
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
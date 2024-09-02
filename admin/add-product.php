<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<section>
        <div class="container mt-5">

            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="manage-product.php" style="text-decoration:none;">
                            <p class="text-danger">Manage Product</p>
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h4 class="signuptitle1">Welcome,</h4>
                    <h4 class="signuptitle">Add Product</h4>

                    <p class="signinmsg mt-2">Add Your Product Details.</p>
    
                    <?php
                              if(isset($_SESSION['upload']))
                              {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']);
                              }
                        ?>
                    <form action="" method="POST" enctype="multipart/form-data" onSubmit="return validateform()" name="frmuserreg" >
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control shadow-sm mt-3" placeholder="Product Name" id="user" name="t1">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="text" class="form-control shadow-sm mt-3" placeholder="Company Name" id="user" name="t2">
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control shadow-sm mt-3" placeholder="Product Price" id="user" name="t3">
                            </div>
                            

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control shadow-sm mt-3" placeholder="Product MRP" id="user" name="t4">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="file" class="form-control shadow-sm mt-3" id="user" name="image">
                        </div>
       
                        <div class="form-group mt-3">
                                <b class="card-text">Select Category:</b> 
                                    <select class="form-select mt-2" id="category" name="category" required>
                                      <option value="">Select category</option>
                                    </select>
                        </div>

                        <div class="form-group mt-3">
                                <b class="card-text">Select Sub Category:</b> 
                                    <select class="form-select mt-2" id="scategory" name="subcategory" required>
                                      <option value="">Select Sub category</option>
                                    </select>
                        </div>

                        <div class="form-group mt-3">
                                <div class="form-group d-flex mt-2">
                                    <p> <b>Active :</b></p>
                                    <input type="radio" class="form-check-input mx-2" name="t6" value="Yes" required>Yes
                                    <input type="radio" class="form-check-input mx-2" name="t6" value="No" required>No
                                    </div>
                            </div>

                        <div class="form-group col-md-12">
                            <textarea rows="5" class="form-control shadow-sm mt-3" placeholder="Product Desciption"
                                id="user" name="t5"></textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <input type="submit" class="form-control shadow-sm mt-3" value="Add Product" id="btn" name="s1">
                        </div>
                    </form>

                </div>


            </div>
        </div>

        </div>
    </section>

<script type="text/javascript" src="assets/js/jquery-3.6.3.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function loaddata(type,category_id){
            $.ajax({
                url:"load-cs.php",
                type:"POST",
                data:{type:type,id:category_id},
                success:function(data){
                    if(type=="subcdata")
                    {
                        $("#scategory").html(data);
                    }
                    else
                    {
                        $("#category").append(data);
                    }
                   
                }
            });
        }
        loaddata();

        $("#category").on("change",function(){
            var category=$("#category").val();

            loaddata("subcdata",category);
        })
    });
</script>

<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>

<?php

    if(isset($_POST['s1']))
    {
        $pname=$_POST['t1'];
        $cname=$_POST['t2'];
        $category=$_POST['category'];
        $subcategory=$_POST['subcategory'];
        $pprice=$_POST['t3'];
        $pmrp=$_POST['t4'];
        $desc=$_POST['t5'];

        if(isset($_POST['t6']))
        {
           $active=$_POST['t6'];
        }
        else
        {
            $active="No";
        }

        if(isset($_FILES['image']['name']))
        {
                  //upload image
                  $image_name=$_FILES['image']['name'];

                  if($image_name!="")
                  {
                          //upload image new image
                          $ext=end(explode('.',$image_name));
                          //  rename the image
                       $image_name="product_image".rand(000,999).'.'.$ext;

                  $source_path=$_FILES['image']['tmp_name'];
                  $destination_path="../assets/img/product/".$image_name;

                  $upload=move_uploaded_file($source_path,$destination_path);
                  if($upload==false)
                  {
                      echo "<script>window.location='add-product.php';</script>";
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

        $query2="insert into product(product_name,company_name,category_id,scategory_id,price,mrp,product_image,description,active) values('$pname','$cname','$category','$subcategory','$pprice','$pmrp','$image_name','$desc','$active')";
        $run2=mysqli_query($conn,$query2);
        if($run2==true)
        {
            echo "<script>window.location='manage-product.php';</script>";
            $_SESSION['add']="<p class='validation-green'>wow!! product Added successfully</p>";
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
            alert("Product name should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t2.value == "")
        {
            alert("Company name should not be empty.!");
            document.frmuserreg.t2.focus();
            return false;
        }
        else if(!document.frmuserreg.t2.value.match(alphaspaceExp))
        {
            alert("Company name should be in character.!");
            document.frmuserreg.t2.focus();
            return false;
        }
        else if(document.frmuserreg.t3.value == "")
        {
            alert("Product price should not be empty.!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(!document.frmuserreg.t3.value.match(numericExpression))
        {
            alert("Product price in numeric.!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(document.frmuserreg.t4.value == "")
        {
            alert("Product MRP should not be empty.!");
            document.frmuserreg.t4.focus();
            return false;
        }
        else if(!document.frmuserreg.t4.value.match(numericExpression))
        {
            alert("Product MRP in numeric.!");
            document.frmuserreg.t4.focus();
            return false;
        }
        else if(document.frmuserreg.image.value == "")
        {
            alert("Please select Product image.!");
            document.frmuserreg.image.focus();
            return false;
        }
        else if(document.frmuserreg.t5.value == "")
        {
            alert("Description should not be empty.!");
            document.frmuserreg.t5.focus();
            return false;
        }
    }
</script>
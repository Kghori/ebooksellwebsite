<?php  include('.\partials\menu.php');  ?>

<?php
    $user_id=$_SESSION['id'];
    $query2="select * from customer where id='$user_id'";
    $run2=mysqli_query($conn,$query2);
    if($run==true)
    {
        $result2=mysqli_fetch_assoc($run2);
        $user=$result2['id'];
    }

    if(isset($_POST['s1']))
    {
       $pro_name=$_POST['name'];
       $pro_image=$_POST['image'];
       $pro_price=$_POST['price'];
       $pro_mrp=$_POST['mrp'];
       $pro_qty=1;

       $query="select * from cart where pname='$pro_name' AND user_id='$user'";
       $run=mysqli_query($conn,$query);
       if(!$run->num_rows>0)
       {
        $query3="insert into cart(pname,pimage,price,mrp,quantity,user_id) values('$pro_name','$pro_image','$pro_price','$pro_mrp','$pro_qty','$user')";
        $run3=mysqli_query($conn,$query3);
        if($run3==true)
        {
            echo "<script>window.location='cart.php';</script>";
            $_SESSION['add-cart']='<div class="alert alert-success bg-success mt-4 text-white text-center alert-dismissible fade show" role="alert">
            <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Product Added Successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
       }
       else
       {
        $_SESSION['alrady']='<div class="alert alert-danger bg-danger mt-4 text-white text-center alert-dismissible fade show" role="alert">
        <i class="fa-sharp fa-solid fa-triangle-exclamation mx-1"></i> <strong> Woops !! </strong> Product Already Added Into Cart.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
       }
    }
?>



<?php  
            if(isset($_GET['product_id']))
            {
                $id=$_GET['product_id'];

                $query="select * from product where product_id='$id'";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    $count=mysqli_num_rows($run);
                    if($count==1)
                    {
                        $result=mysqli_fetch_assoc($run);
                        $id=$result['product_id'];
                        $pname=$result['product_name'];
                        $cname=$result['company_name'];
                        $price=$result['price'];
                        $mrp=$result['mrp'];
                        $cimage=$result['product_image'];
                        $desc=$result['description'];
                    }
                }
            }
?>

<section id="about">
    <div class="container p-1">
    <?php
                if(isset($_SESSION['alrady']))
                {
                    echo $_SESSION['alrady'];
                    unset($_SESSION['alrady']);
                }
            ?>
        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Products Information</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

      
        <div class="row justify-content-center p-3">
          
            <div class="col-lg-4 col-md-6 col-12 p-5 mt-3">
                <?php 
                                            if($cimage!="")
                                            {
                                                ?>
                <img src="./assets/img/product/<?php echo $cimage; ?>" width="300px" height="300px" class="img-fluid">
                <?php
                                            }
                                            else
                                            {
                                                echo "<p class='validation-red'>Image Not Added !!</p>";
                                            }
                              ?>
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <h4 class="s-title">
                    <?php echo $pname; ?>
                </h4>
                <h4 class="c-name mt-3">
                    <?php echo $cname; ?>
                </h4>
                <?php
                                $price;
                                $mrp;
                                $save;
                                $save=$mrp-$price;
                                ?>
                <h4 class="s-price">Rs.
                    <?php echo $price; ?>.00 <p class="c-name mt-2">MRP. <del>
                            <?php echo $mrp; ?>.00
                        </del> <b class="save mx-2">Save Rs.
                            <?php echo $save; ?>.00
                        </b> </p>
                </h4>
                <h4 class="c-name">( Inclusive of all taxes )</h4>
                <h4><span class="badge text-bg-success">In stock</span></h4>

                <form method="POST">
                <div class="d-flex">
                                     <input type="hidden" name="image" value="<?php  echo $cimage; ?>">
                                    <input type="hidden" name="name" value="<?php  echo $pname; ?>">
                                    <input type="hidden" name="price" value="<?php  echo $price; ?>">
                                    <input type="hidden" name="mrp" value="<?php  echo $mrp; ?>">
                                    <button class="btn" id="cart-btn" name="s1"> Add To Cart<span><i class="fa-sharp fa-solid fa-cart-shopping position-relative mt-2 mx-2"></i></span></button>
                </div>
                </form>
                <p class="mt-4"><b class="text-black">Desctiption: </b>
                    <?php echo $desc; ?>
                </p>
            </div>
        </div>
       

    </div>
</section>

<?php   include('.\partials\footer.php');  ?>




<?php  include('.\partials\menu.php');  ?>



<section id="about">
    <div class="container p-1">
    <div class="stronghold-heading1">
                <div class="heading-subtitle1">
                    <span class="heading-sep-front1"></span>
                    <span class="heading-subtitle-span1">My Cart</span>
                    <span class="heading-sep-front1"></span>
                </div>
            </div>
        <?php
                if(isset($_SESSION['add-cart']))
                {
                    echo $_SESSION['add-cart'];
                    unset($_SESSION['add-cart']);
                }
                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }          
            ?>
        <?php
                                               $user_id=$_SESSION['id'];     
                                            $query="select * from cart where user_id='$user_id'";
                                            $run=mysqli_query($conn,$query);
                                            if($run==true)
                                            {
                                                $count=mysqli_num_rows($run);
                                                if($count>0)
                                                {
                                                    ?>
 <div class="row gy-3 mt-3 justify-content-center">

<div class="col-lg-7 col-md-12">
    <div class="card" id="cart">

        <h5 class="card-header">Groceries Basket<b class="float-end">( <?php echo $total; ?> Items )</b></h5>
        <?php
                                $user_id=$_SESSION['id'];
                      

                                $query="select * from cart where user_id='$user_id'";
                                $run=mysqli_query($conn,$query);
                                if($run==true)
                                {
                                    $count=mysqli_num_rows($run);
                                    if($count>0)
                                    {
                                        while($result=mysqli_fetch_assoc($run))
                                        {
                                            $id=$result['id'];
                                            $pname=$result['pname'];
                                           $pimage=$result['pimage'];
                                            $price=$result['price'];
                                            $mrp=$result['mrp'];
                                            $qty=$result['quantity'];          
                                            ?>

        <div class="card-body">

            <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-3 col-4 text-center">
                    <?php
                if($pimage!="")
                {
                    ?>
                    <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid" alt="..."
                        width="75%" height="75%">
                    <?php
                }
                else
                {
                    echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                }
                ?>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-7">

                    <div class="d-flex float-end">
                        <form method="POST">
                            <input type="number" class="form-control text-center" style="width:70px;" value="<?php echo $qty; ?>" name="t1">
                            <input type="hidden" name="id" value="<?php  echo $id; ?>">
                            <button class="btn badge text-bg-success mt-2" name="update"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                            <button class="btn badge text-bg-danger mt-2" name="remove"><i class="fa-sharp fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>

                    <h5 class="p-name">
                        <?php echo $pname ?>
                    </h5>
                    <h4 class="p-price">Rs.
                        <?php echo $price; ?>.00<b><del class="p-mrp mx-2">
                                <?php echo $mrp; ?>.00
                            </del></b>
                    </h4>
                    <?php
            $price;
            $mrp;
            $save;
            $save=$mrp-$price;
            ?>
                    <h5 class="save">Save Rs.
                        <?php echo $save; ?>.00
                    </h5>
                </div>
            </div>
        </div>
        <?php
                                }
                            }
                        }
        ?>
    </div>
</div>

<div class="col-lg-5 col-md-12">
    <div class="card" id="cart">
        <h5 class="card-header">Payment Details</h5>
        <div class="card-body">
            <?php
                                  $user_id=$_SESSION['id'];
                                

                                  $query="select * from cart where user_id='$user_id'";
                                  $run=mysqli_query($conn,$query);
                                  if($run==true)
                                  {
                                      $count=mysqli_num_rows($run);
                                      if($count>0)
                                      {
                                        $totalmrp=0;
                                        $totalprice=0;
                                        $save=0;
                                          while($result=mysqli_fetch_assoc($run))
                                          {
                                               $p1=$result['price'];
                                               $m1=$result['mrp'];
                                               $q1=$result['quantity'];

                                               $price=$p1*$q1;
                                               $totalprice=$price+$totalprice;

                                               $mrp=$m1*$q1;
                                                $totalmrp=$mrp+$totalmrp;
                                                $save=$mrp-$price+$save;
                                          }
                                      }
                                  }
                ?>
            <p class="card-text">Total MRP<b class="float-end c-price">Rs.
                    <?php echo $totalmrp; ?>.00
                </b> </p>
            <h4 class="c-name">( Inclusive of all Discounts )</h4>
            <p class="card-text">Products Discount (%)<b class="float-end c-price">Rs.
                    <?php echo $save; ?>.00
                </b> </p>
            <p class="card-title">Total Amounts <b class="float-end">Rs.
                    <?php echo $totalprice; ?>.00
                </b> </p>
            <a href="allproducts.php" class="btn btn-success mt-3">Continue Shopping<span><i
                        class="fa-sharp fa-solid fa-cart-shopping mx-1"></i></span></a>
                        
            <a href="checkout.php" class="btn btn-primary mt-3 float-end">Process to checkout<span><i
                        class="fa-sharp fa-solid fa-angle-right mx-1"></i></span></a>
        </div>
    </div>
</div>

</div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
        <div class="alert w-100 text-center p-5" role="alert">
            <img src=".\assets\img\no-connection.png" alt="" class="img-fluid" height="250px" width="250px">
            <p class="empty">No items added in your cart</p>
        </div>
        <?php
                                                }
                                            }
            ?>

    </div>
</section>


<?php
        if(isset($_POST['remove']))
        {
            $id=$_POST['id'];

            $query2="delete from cart where id='$id'";
            $run2=mysqli_query($conn,$query2);
            if($run2==true)
            {
                echo "<script>window.location='cart.php';</script>";
                $_SESSION['remove']='<div class="alert alert-danger bg-danger text-white text-center alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check mx-1"></i>  Product Removed Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }                 
                                
        }

        if(isset($_POST['update']))
        {
            $id=$_POST['id'];
            $q1=$_POST['t1'];

            if($q1<=0 OR $q1>=5)
            {
                echo "<script>window.location = 'cart.php';</script>";
                $_SESSION['remove']='<div class="alert alert-danger bg-danger text-white text-center alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check mx-2"></i>Sorry !! Please select Between 1 to 5 Quantity
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else
            {
                $query5="update cart set quantity='$q1' where id='$id'";
                $run5=mysqli_query($conn,$query5);
                if($run5==true)
                {
                    echo "<script>window.location = 'cart.php';</script>";
                    $_SESSION['remove']='<div class="alert alert-success bg-success text-white text-center alert-dismissible fade show" role="alert">
                    <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Quantity updated Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
            }
        }
?>

<script src="..\bigstore\assets\js\qty.js"></script>
<?php   include('.\partials\footer.php');  ?>
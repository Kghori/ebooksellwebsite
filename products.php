<?php  include('.\partials\menu.php');  ?>



<section id="about">
  <div class="container p-1">

  <div class="stronghold-heading">
                <div class="heading-subtitle">
                    <span class="heading-sep-front"></span>
                    <span class="heading-subtitle-span">shop
                    </span>
                    <span class="heading-sep-front"></span>
                </div>
            </div>


          <div class="row mx-0 mx-sm-5 mt-5">
<?php
                if(isset($_GET['category_id']))
                {
                  
                    $cid=$_GET['category_id'];
                    
                    $query="SELECT * from product where category_id='$cid' and active='Yes'";
                    $run=mysqli_query($conn,$query);
                    if($run==true)
                    {
                        $count=mysqli_num_rows($run);
                        if($count>0)
                        {
                            while($result=mysqli_fetch_assoc($run))
                            {
                              $id=$result['product_id'];
                              $pname=$result['product_name'];
                              $pimage=$result['product_image'];
                              $cname=$result['company_name'];
                              $price=$result['price'];
                              $mrp=$result['mrp'];
                                ?>
                                  
            <div class="col-lg-3 col-md-4 col-6">
              <div class="shop">
                <div class="card">
                <?php
                            if($pimage!="")
                            {
                                ?>
                        <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid p-4" alt="...">
                        <?php
                            }
                            else
                            {
                                echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                            }
                    ?>
                  <div class="card-body">
                    <h5 class="company-name"><?php echo $cname; ?></h5>
                    <h5 class="p-name"><?php echo $pname; ?></h5>
                    <h4 class="p-price">Rs.
                                <?php echo $price; ?>.00<del class="p-mrp mx-2">
                                        <?php echo $mrp; ?>.00
                                    </del>
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
                    <a href="information.php?product_id=<?php echo $id; ?>" class="btn w-100 mt-2" id="btn">Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
                                <?php
                            }
                        }
                        else
                        {
                          ?>
                          <div class="alert w-100 text-center mt-5" role="alert">
                              <img src="..\bigstore\assets\img\empty_cart.png" alt="" class="img-fluid" height="190px" width="190px">
                              <p class="empty">Woops !! Products isn't available in shop </p>
                        </div> 
              <?php
                        }
                    }
                }
?>  
    </div>


  </div>
</section>


<?php   include('.\partials\footer.php');  ?>
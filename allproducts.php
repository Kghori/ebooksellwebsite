<?php  include('.\partials\menu.php');  ?>



<section id="about">
  <div class="container p-1">
     
                        <!--============banner=================-->
                        <section id="banner">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-md-6 mb-3 mb-lg-0">
            <div>
              <div class="py-10 px-8 rounded-3" style="background:url(assets/img/banner/grocery-banner.png)no-repeat; background-size: cover; background-position: center;">
              <div class="banner">
                            <h3 class="fw-bold mb-1">Fruits &amp; Vegetables
                            </h3>
                            <p class="mb-4">Get Upto <span class="fw-bold">60%</span> Off</p>
                         
                        </div>
              </div>

            </div>

          </div>
          <div class="col-12 col-md-6 ">

            <div>
              <div class="py-10 px-8 rounded-3" style="background:url(assets/img/banner/grocery-banner-2.jpg)no-repeat; background-size: cover; background-position: center;">
              <div class="banner">
                            <h3 class="fw-bold mb-1">Top deals on grocery products
                            </h3>
                            <p class="mb-4">Get Upto <span class="fw-bold">50%</span> Off</p>
                        </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="stronghold-heading">
                <div class="heading-subtitle">
                    <span class="heading-sep-front"></span>
                    <span class="heading-subtitle-span">shop
                    </span>
                    <span class="heading-sep-front"></span>
                </div>
            </div>

        <div class="wrapper">

            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 gy-2 p-0 p-sm-4">
<?php
                    $query="SELECT * from product where active='Yes'";
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
            <div class="col">
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
                          <div class="alert w-100 text-center" role="alert">
                              <img src="..\bigstore\assets\img\empty_cart.png" alt="" class="img-fluid" height="180px" width="180px">
                              <p class="empty">Woops !! Products isn't available in shop </p>
                        </div> 
              <?php
                        }
                    }
?>  
    </div>
    </div>
  </div>
</section>

<?php   include('.\partials\footer.php');  ?>
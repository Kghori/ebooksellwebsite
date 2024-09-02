<?php  include('.\partials\menu.php');  ?>


    
 <!--=====================================================================
                                    Home
    =======================================================================-->

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=".\assets\img\banner\Fresh & Healthy.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
     <img src=".\assets\img\banner\powder.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
     <img src=".\assets\img\banner\chocolates.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
     <img src=".\assets\img\banner\grcoery.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!--<div class="header">
    <section id="home">
        <div class="container">
            <div class="row justify-content-center mt-5 p-2">
                <div class="col-lg-6 p-4 order-2 order-lg-1 mt-4">

                <b>Online Grocery Store</b>
                    <h1><span class="strong">Best Price </span>This Year</h1>
                    <p>We deliver your products safely to your home in a reasonable time. Try us and then buy us!
                    </p>
                    <a href="allproducts.php" class="btn" id="btn">Shop Now</a>
                </div>

                <div class="col-lg-5 order-1 order-lg-2 p-2">
                    <img src="..\Bigstore\assets\img\Grocery-Transparent-PNG.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</div>-->

<!--=======================================================
                            category
    ==========================================================-->
<section id="category">
    <div class="container text-center">


        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Category</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <p>There are many categories available in this grocery website.choose our categories and buy us.!</p>
        <div class="main-carousel mt-4">

            <?php
        $query="select * from category where active='Yes' ";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            $count=mysqli_num_rows($run);
            if($count>0)
            {
                while($result=mysqli_fetch_assoc($run))
                {
                    $id=$result['category_id'];
                    $cname=$result['category_name'];
                    $cimage=$result['category_image'];
                    $disc=$result['discount'];
                    ?>

            <div class="product1">
                <div class="card" style="width: 14rem;">
                    <?php
                            if($cimage!="")
                            {
                                ?>
                    <img src="./assets/img/category/<?php echo $cimage; ?>" class="img-fluid" alt="...">
                    <?php
                            }
                            else
                            {
                                echo "<p class='validation-red text-center mt-5 p-3 '>Category Image Not Added</p>";
                            }
                    ?>

                    <div class="card-body">
                        <h5 class="p-name">
                            <?php echo $cname; ?>
                        </h5>
                        <h4 class="c-discount">( Up To
                            <?php echo $disc; ?>% OFF )
                        </h4>
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
                <p class="empty">Woops !! Admin has not added any category</p>
            </div>
            <?php
            }
        }
            ?>

        </div>
    </div>
</section>


<!--=======================================================
                            banner
    ==========================================================-->
<section id="banner">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 mb-3 mb-lg-0">
                <div>
                    <div class="py-10 px-8 rounded-3"
                        style="background:url(assets/img/banner/grocery-banner.png)no-repeat; background-size: cover; background-position: center;">
                        <div class="banner">
                            <h3 class="fw-bold mb-1">Fruits &amp; Vegetables
                            </h3>
                            <p class="mb-4">Get Upto <span class="fw-bold">60%</span> Off</p>
                            <a href="allproducts.php" class="btn" id="btn">Shop Now</a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-6 ">

                <div>
                    <div class="py-10 px-8 rounded-3"
                        style="background:url(assets/img/banner/grocery-banner-2.jpg)no-repeat; background-size: cover; background-position: center;">
                        <div class="banner">
                            <h3 class="fw-bold mb-1">Top deals on grocery products
                            </h3>
                            <p class="mb-4">Get Upto <span class="fw-bold">50%</span> Off</p>
                            <a href="allproducts.php" class="btn" id="btn">Shop Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!--=======================================================
                            Big deals grocery product
    ==========================================================-->

    <section id="category">
    <div class="container mt-5" id="category1">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Big deals On grocery</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <div class="main-carousel">
            <?php
                $query="SELECT * from product where active='Yes' AND category_id='8'";
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
            <div class="product">
                <div class="card" style="width: 13rem;">
                    <?php
                            if($pimage!="")
                            {
                                ?>
                    <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid" alt="...">
                    <?php
                            }
                            else
                            {
                                echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                            }
                    ?>

                    <div class="card-body">
                        <h5 class="company-name">
                            <?php echo $cname; ?>
                        </h5>
                        <h5 class="p-name">
                            <?php echo $pname; ?>
                        </h5>
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
                        <?php
                             ?>

                        <a href="information.php?product_id=<?php echo $id; ?>" class="btn w-100 mt-2 " id="p-btn">Buy
                            Now</a>
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
                <p class="empty">Woops !! Admin has not added any products</p>
            </div>
            <?php
                    }
                }
        ?>
        </div>
    </div>
</section>

<!--=======================================================
                            Product fruits & vegetables
    ==========================================================-->

<section id="category">
    <div class="container mt-5" id="category1">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">fruits & Vegetables</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <div class="main-carousel">
            <?php
                $query="SELECT * from product where active='Yes' AND category_id='2' or category_id='3'";
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
            <div class="product">
                <div class="card" style="width: 13rem;">
                    <?php
                            if($pimage!="")
                            {
                                ?>
                    <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid" alt="...">
                    <?php
                            }
                            else
                            {
                                echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                            }
                    ?>

                    <div class="card-body">
                        <h5 class="company-name">
                            <?php echo $cname; ?>
                        </h5>
                        <h5 class="p-name">
                            <?php echo $pname; ?>
                        </h5>
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
                        <?php
                             ?>

                        <a href="information.php?product_id=<?php echo $id; ?>" class="btn w-100 mt-2 " id="p-btn">Buy
                            Now</a>
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
                <p class="empty">Woops !! Admin has not added any products</p>
            </div>
            <?php
                    }
                }
        ?>
        </div>
    </div>
</section>

<!--=======================================================
                            Dairy & Bakery
    ==========================================================-->

    <section id="category">
    <div class="container mt-5" id="category1">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Dairy and Bakery</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <div class="main-carousel">
            <?php 
                $query="SELECT * from product where active='Yes' and category_id='7' or category_id='1'";
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
            <div class="product">
                <div class="card" style="width: 13rem;">
                    <?php
                            if($pimage!="")
                            {
                                ?>
                    <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid" alt="...">
                    <?php
                            }
                            else
                            {
                                echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                            }
                    ?>

                    <div class="card-body">
                        <h5 class="company-name">
                            <?php echo $cname; ?>
                        </h5>
                        <h5 class="p-name">
                            <?php echo $pname; ?>
                        </h5>
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
                        <?php
                             ?>

                        <a href="information.php?product_id=<?php echo $id; ?>" class="btn w-100 mt-2 " id="p-btn">Buy
                            Now</a>
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
                <p class="empty">Woops !! Admin has not added any products</p>
            </div>
            <?php
                    }
                }
        ?>
        </div>
    </div>
</section>

<!--=======================================================
                            Personal care
    ==========================================================-->

    <section id="category">
    <div class="container mt-5" id="category1">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Personal Care</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <div class="main-carousel">
            <?php 
                $query="SELECT * from product where active='Yes' and category_id='9'";
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
            <div class="product">
                <div class="card" style="width: 13rem;">
                    <?php
                            if($pimage!="")
                            {
                                ?>
                    <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid" alt="...">
                    <?php
                            }
                            else
                            {
                                echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                            }
                    ?>

                    <div class="card-body">
                        <h5 class="company-name">
                            <?php echo $cname; ?>
                        </h5>
                        <h5 class="p-name">
                            <?php echo $pname; ?>
                        </h5>
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
                        <?php
                             ?>

                        <a href="information.php?product_id=<?php echo $id; ?>" class="btn w-100 mt-2 " id="p-btn">Buy
                            Now</a>
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
                <p class="empty">Woops !! Admin has not added any products</p>
            </div>
            <?php
                    }
                }
        ?>
        </div>
    </div>
</section>

<!--=====================================================================
                                    Services
    =======================================================================-->

    <section id="services" class="services">
        <div class="container mt-5 mt-sm-0 p-3 p-sm-5" data-aos="fade-up">

            <div class="stronghold-heading">
                <div class="heading-subtitle">
                    <span class="heading-sep-front"></span>
                    <span class="heading-subtitle-span">services</span>
                    <span class="heading-sep-front"></span>
                </div>
            </div>

            <h2 class="titlename mb-4">Quality Service is Our Guarantee</h2>

            <p class="text-center">You have a few options available in terms of starting a grocery delivery service.
                 The first is to simply contract with local grocery stores to deliver customer orders for a fee.Grocery delivery services are often very profitable business ventures, 
                 as the convenience of home delivery makes getting customers very easy.</p>

                 <div class="wrapper">
                <div class="row mt-5">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <img src=".\assets\img\services\fast-delivery.png" height="8%" width="10%" alt=""
                                class="img-fluid">
                            <h4><a href="#">Extra Fast Delivery</a></h4>
                            <p>Extra Fast Delivery, lets sellers offer buyers a much faster home Delivery.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <img src=".\assets\img\services\discount.png" height="8%" width="10%" alt=""
                                class="img-fluid">
                            <h4><a href="#">Member Discount (%)</a></h4>
                            <p>Biggest member discount on Grocery products,so you can choose items and buy us.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src=".\assets\img\services\clock.png" height="8%" width="10%" alt="" class="img-fluid">
                            <h4><a href="#">Quick Order</a></h4>
                            <p>Quick Order can be used by customers who are loggled in to their accounts.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <img src=".\assets\img\services\support.png" height="8%" width="10%" alt=""
                                class="img-fluid">
                            <h4><a href="#">Customer Support 24x7</a></h4>
                            <p>Customer support 24x7 is a range of customer services to assist customers in.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="500">
                        <div class="icon-box">
                            <img src=".\assets\img\services\earning.png" height="8%" width="10%" alt=""
                                class="img-fluid">
                            <h4><a href="#">Easy Return (100%)</a></h4>
                            <p>In website Customer can easily return products and return payments easily.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="600">
                        <div class="icon-box">
                            <img src=".\assets\img\services\dollar-symbol.png" height="8%" width="10%" alt=""
                                class="img-fluid">
                            <h4><a href="#">Best Price</a></h4>
                            <p>Best price for all products like Fruits and Vegetables, Rice, Packaged items etc.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

<!--=======================================================
                            ABout us
    ==========================================================-->

<section id="about">
    <div class="container p-3 p-sm-5">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">About us</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <h2 class="titlename mb-4">Grocery is what we do</h2>
        <div class="row">
            <div class="col-lg-12">
            <p class="text-center">This website is biggest grocery store online sustenance.
                        There are many products available in this grocery website With more items and over 8+ brands on our list, you will discover all that you are searching for. </p>
            </div>

            <div class="col-lg-6 pt-4 pt-lg-0">
            <p>Find new items and shop for all your sustenance and grocery needs from the solace of your home or office.This website provides best Quality Services.</p>
            <ul style="list-style:none;">
                        <li>
                            <p><span><i class="fa-sharp fa-solid fa-check mx-2"></i></span>Extra Fast Delivery.</p>
                        </li>
                        <li>
                            <p><span><i class="fa-sharp fa-solid fa-check mx-2"></i></span>Cash On Delivery</p>
                        </li>
                        <li>
                            <p><span><i class="fa-sharp fa-solid fa-check mx-2"></i></span>Best Price & Discounts.</p>
                        </li>
                    </ul>
            </div>

            <div class="col-lg-6 pt-4 pt-lg-0">
            <p>Appropriate from new Fruits and Vegetables, Rice and Lentils, Spices and Seasonings to Packaged items,
                         Beverages, Personal consideration items, Meats – we have everything..</p>

                         <p>Browse a wide scope of choices in each class, 
                            solely handpicked to enable you to locate the best quality accessible at the least cost.</p>

                <a href="about.php" class="btn mt-3" id="btn">Read More</a>
            </div>

        </div>
    </div>
</section>


<!--=======================================================
                            Contact
    ==========================================================-->

<section id="contact" class="services">
    <div class="container p-3 p-sm-5" data-aos="fade-up">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Quick support</span>
                <span class="heading-sep-front"></span>
            </div>
        </div>

        <h2 class="titlename mb-4">Contact Us</h2>

       

        <div>
            <iframe style="border:0; width: 100%; height: 270px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118573.45803524675!2d72.08486470160913!3d21.763978341151127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f5081abb84e2f%3A0xf676d64c6e13716c!2sBhavnagar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1639637563762!5m2!1sen!2sin"
                frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</section>

<?php   include('.\partials\footer.php');  ?>
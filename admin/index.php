<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<section>
    <div class="container mt-5">
      <div class="stronghold-heading">
        <div class="heading-subtitle">
          <span class="heading-sep-front"></span>
          <span class="heading-subtitle-span">Dashboard</span>
          <span class="heading-sep-front"></span>
        </div>
      </div>

         <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }                    
          ?>
						
        <div class="row mt-2 gy-3">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="admin()">
                      <div class="d-icon"><i class="fa-sharp fa-solid fa-user"></i></div>
                      <div class="d-title">Total Admin</div>
                      <?php
                            $query="select * from admin";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="customer()">
                      <div class="d-icon"><i class="fa-sharp fa-solid fa-users"></i></div>
                      <div class="d-title">Total Customers</div>
                      <?php
                            $query="select * from customer";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="category()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-cubes"></i></div>
                      <div class="d-title">Total Category</div>
                      <?php
                            $query="select * from category";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="product()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-utensils"></i></div>
                      <div class="d-title">Total Products</div>
                      <?php
                            $query="select * from product";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>
        </div>

        <div class="row mt-2 gy-3">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="order()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-cart-shopping position-relative mt-2 mx-2"></i></div>
                      <div class="d-title">Total Orders</div>
                      <?php
                            $query="select * from order_detail";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="bill()">
                      <div class="d-icon"><i class="fa-sharp fa-solid fa-clipboard"></i></div>
                      <div class="d-title">Total Bills</div>
                      <?php
                            $query="select * from bill";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="subcategory()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-cubes"></i></div>
                      <div class="d-title">Total sub category</div>
                      <?php
                            $query="select * from sub_category";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="order()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-xmark"></i></div>
                      <div class="d-title">Cancel Orders</div>
                      <?php
                            $query="select * from order_detail where status='Cancled'";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>
        </div>

        <div class="row mt-2 gy-3">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="order()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-clock"></i></div>
                      <div class="d-title">Pendding Orders</div>
                      <?php
                            $query="select * from order_detail where status='Pending'";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="order()">
                      <div class="d-icon"><i class="fa-sharp fa-solid fa-dna"></i></div>
                      <div class="d-title">Processign Orders</div>
                      <?php
                           $query="select * from order_detail where status='Processing'";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="order()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-truck"></i></div>
                  <div class="d-title">Shipped Orders</div>
                      <?php
                            $query="select * from order_detail where status='Shipped'";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="ract" onclick="order()">
                  <div class="d-icon"><i class="fa-sharp fa-solid fa-circle-check"></i></div>
                  <div class="d-title">Completed Orders</div>
                      <?php
                            $query="select * from order_detail where status='Delivered'";
                            $run=mysqli_query($conn,$query);
                            if($run==true)
                            {
                                if($total=mysqli_num_rows($run))
                                {
                                    ?>
                                    <div class="d-total"><?php echo $total; ?></div>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="d-total">00</div>
                                <?php
                                }
                            }
                      ?>
                  </div>
            </div>
        </div>

    </div>
  </section>

<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>


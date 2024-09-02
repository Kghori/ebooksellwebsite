<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>


<section>
        <div class="container">

        <div class="stronghold-heading">
                        <div class="heading-subtitle">
                            <span class="heading-sep-front"></span>
                            <span class="heading-subtitle-span">Manage Product</span>
                            <span class="heading-sep-front"></span>
                        </div>

                        <?php
                              if(isset($_SESSION['add']))
                              {
                                echo $_SESSION['add'];
                                unset($_SESSION['add']);
                              }
                              if(isset($_SESSION['remove']))
                              {
                                echo $_SESSION['remove'];
                                unset($_SESSION['remove']);
                              }
                              if(isset($_SESSION['delete']))
                              {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                              }
                              if(isset($_SESSION['update']))
                              {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                              }
                        ?>
                        <a href="add-product.php" class="btn mt-3" id="btn">Add Product</a>
                    </div>


            <div class="row mt-3">

                <div class="col-12">
                    <div class="card" id="cart">
                        <h5 class="card-header">Products Details</h5>
                        <div class="card-body">

                        <div class="wrapper">
                              <table class="table text-center table-hover table-borderless">
                        <thead class="table-header">
                          <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">MRP Price</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-detail">
                        <?php
                               $limit=10;

                               if(isset($_GET['page']))
                               {
                                   $page=$_GET['page'];
                               }
                               else
                               {
                                   $page=1;
                               }
                               $offset=($page-1)*$limit;        

                            $query="SELECT p.*,cat.category_name,scat.sub_category_name from product p inner join category cat on p.category_id=cat.category_id inner join sub_category scat on p.scategory_id=scat.scategory_id LIMIT {$offset},{$limit}";
                              $run=mysqli_query($conn,$query);
                              $sn=1;
                              if($run==true)
                              {
                                  $count=mysqli_num_rows($run);
                                  if($count>0)
                                  {
                                    while($result=mysqli_fetch_assoc($run))
                                    {
                                        $id=$result['product_id'];
                                        $pname=$result['product_name'];
                                        $category=$result['category_name'];
                                        $sub_category=$result['sub_category_name'];
                                        $price=$result['price'];
                                        $mrp=$result['mrp'];
                                        $pimage=$result['product_image'];
                                        $active=$result['active'];
                                        ?>
                        <tr>
                            <th scope="row"><?php echo $sn++; ?></th>
                            <td>
                              <?php 
                                  if($pimage!="")
                                  {
                                    ?>
                                        <img src="../assets/img/product/<?php  echo $pimage; ?>" alt=""  width="60px" height="60px" class="img-fluid">
                                    <?php
                                  }
                                  else
                                  {
                                    echo "<p class='text-danger text-center mt-2'>Image Not Added !!</p>";
                                  }
                              ?>  
                            </td>
                            <td><?php echo $pname; ?></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $sub_category; ?></td>
                            <td>Rs.<?php echo $price; ?>.00</td>
                            <td>MRP.<?php echo $mrp; ?>.00</del></td>
                            <?php
                                    if($active=='Yes')
                                    {
                                        ?>
                                                <td><span class="badge text-bg-success mt-2"><?php echo $active; ?></span></td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>  
                                            <td><span class="badge text-bg-danger mt-2"><?php echo $active; ?></span></td>
                                        <?php
                                    }
                            ?>
                            <td>
                                <a href="update-product.php?product_id=<?php echo $id; ?>" class="btn btn-success mt-2"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>  
                                <a href="delete-product.php?product_id=<?php echo $id; ?>&product_image=<?php echo $pimage ?>" class="btn btn-danger mt-2"><i class="fa-sharp fa-solid fa-trash-can"></i></a></td>
                            </td>
                          </tr>
                                        <?php
                                    }
                                  }
                                  else
                                  {
                                      ?>                                 
                                      <td colspan="9"> <div class="alert w-100 text-center" role="alert">
                              <img src="\bigstore\assets\img\empty_cart.png" alt="" class="img-fluid" height="180px" width="180px">
                              <p class="empty mt-3">No products available..!</p>
                        </div> </td>
                                      <?php
                                  }
                              }

                        ?>
                        </tbody>
                      </table>
                              </div>

                              <?php  
                $query1="select * from product";
                $run1=mysqli_query($conn,$query1);
                if($run1==true)
                {
                    if(mysqli_num_rows($run1))
                    {
                        $total_records=mysqli_num_rows($run1);
                        $total_page=ceil($total_records/$limit);

                        echo '<ul class="pagination justify-content-center">';
                        if($page>1)
                        {
                            echo '<li class="page-item"><a class="page-link" href="manage-product.php?page='.($page-1).'">Previous</a></li>';
                        }
                        for($i=1;$i<=$total_page;$i++)
                        {
                            if($i==$page)
                            {
                                $active="active";
                            }
                            else
                            {
                                $active="";
                            }
                           ?>
                                    <li class="page-item <?php echo $active; ?>"><a class="page-link" href="manage-product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                           <?php
                        }
                        if($total_page>$page)
                        {
                            echo '<li class="page-item"><a class="page-link" href="manage-product.php?page='.($page+1).'">Next</a></li>';
                        }
                       
                        echo '</ul>';
                        
                    }
                }
    ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>
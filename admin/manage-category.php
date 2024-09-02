<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>


<section>
        <div class="container">
        <div class="stronghold-heading">
                        <div class="heading-subtitle">
                            <span class="heading-sep-front"></span>
                            <span class="heading-subtitle-span">Manage Category</span>
                            <span class="heading-sep-front"></span>
                        </div>
                <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }

                        if(isset($_SESSION['upload']))
                        {
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
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

                        if(isset($_SESSION['failed-remove']))
                        {
                            echo $_SESSION['failed-remove'];
                            unset($_SESSION['failed-remove']);
                        }

                        if(isset($_SESSION['category-not-found']))
                        {
                            echo $_SESSION['category-not-found'];
                            unset($_SESSION['category-not-found']);
                        }

                ?>
                        <a href="add-category.php" class="btn mt-3" id="btn">Add Category</a>
                    </div>

            <div class="row mt-3">

                <div class="col-12">
                    <div class="card" id="cart">
                        <h5 class="card-header">Category Details</h5>
                        <div class="card-body">

                        <div class="wrapper">
                        <table class="table text-center table-hover table-borderless">
                        <thead class="table-header">
                          <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Discount(%)</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-detail">

                        <?php
                         $limit=5;

                         if(isset($_GET['page']))
                         {
                             $page=$_GET['page'];
                         }
                         else
                         {
                             $page=1;
                         }
                         $offset=($page-1)*$limit;
                            $query="select * from category LIMIT {$offset},{$limit}";
                            $run=mysqli_query($conn,$query);
                            $sn=1;
                            if($run==true)
                            {
                                $count=mysqli_num_rows($run);
                                if($count>0)
                                {
                                    while($result=mysqli_fetch_assoc($run))
                                    {
                                        $id=$result['category_id'];
                                        $name=$result['category_name'];
                                        $image_name=$result['category_image'];
                                        $disc=$result['discount'];
                                        $active=$result['active'];
                                        ?>
                     <tr>
                            <th scope="row"><?php echo $sn++; ?></th>

                            <td>
                                <?php
                                        if($image_name!="")
                                        {
                                                ?>
                                        <img src="../assets/img/category/<?php echo $image_name; ?>" width="60px" height="60px" class="img-fluid">
                                                <?php
                                        }
                                        else
                                        {
                                            echo "<p class='text-danger text-center mt-2'>Image Not Added !!</p>";
                                        }
                                ?>
                            </td>

                            <td><?php echo $name; ?></td>
                            <td><?php echo $disc; ?>%</td>
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
                                <a href="update-category.php?category_id=<?php echo $id; ?>" class="btn btn-success mt-2"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>  
                                <a href="delete-category.php?category_id=<?php echo $id; ?>&category_image=<?php echo $image_name; ?>" class="btn btn-danger mt-2"><i class="fa-sharp fa-solid fa-trash-can"></i></a></td>
                            </td>
                          </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <td colspan="6"> <div class="alert w-100 text-center" role="alert">
                              <img src="\bigstore\assets\img\empty_cart.png" alt="" class="img-fluid" height="180px" width="180px">
                              <p class="empty mt-3">No category available..!</p>
                        </div> </td>
                                    <?php
                                }
                            }
                        ?>

                        </tbody>
                      </table>
                        </div>
                        <?php  
                $query1="select * from category";
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
                            echo '<li class="page-item"><a class="page-link" href="manage-category.php?page='.($page-1).'">Previous</a></li>';
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
                                    <li class="page-item <?php echo $active; ?>"><a class="page-link" href="manage-category.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                           <?php
                        }
                        if($total_page>$page)
                        {
                            echo '<li class="page-item"><a class="page-link" href="manage-category.php?page='.($page+1).'">Next</a></li>';
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

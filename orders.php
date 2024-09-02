<?php  include('.\partials\menu.php');  ?>


<section id="about">
        <div class="container p-1">
        <div class="stronghold-heading1">
                <div class="heading-subtitle1">
                    <span class="heading-sep-front1"></span>
                    <span class="heading-subtitle-span1">Order History</span>
                    <span class="heading-sep-front1"></span>
                </div>
            </div>
        <?php
                    if(isset($_SESSION['order']))
                    {
                        echo $_SESSION['order'];
                        unset($_SESSION['order']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
        ?>
        <?php
                       $user_id=$_SESSION['id'];
                                            $query="select * from order_detail where user_id='$user_id'";
                                            $run=mysqli_query($conn,$query);
                                            if($run==true)
                                            {
                                                $count=mysqli_num_rows($run);
                                                if($count>0)
                                                {
                                                    ?>

<div class="row gy-3 mt-3">

<div class="col-12">
    <div class="card" id="cart">
        <h5 class="card-header">My Order History</h5>

        <div class="card-body">
                <div class="wrapper">
                    <table class="table table-borderless text-center"> 
                    <thead class="table-header">
<tr>
<th scope="col">SR No.</th>
<th scope="col">Fullname</th>
<th scope="col">Email</th>
<th scope="col">Order Date</th>
<th scope="col">Status</th>
<th scope="col">Payment</th>
<th scope="col">Toatl Amount</th>
<th scope="col">Action</th>
</tr>
</thead>

<tbody>
<?php
                                $user_id=$_SESSION['id'];
                  
                                $query="select * from order_detail where user_id='$user_id'";
                                $run=mysqli_query($conn,$query);
                                $sn=1;
                                if($run==true)
                                {
                                    $count=mysqli_num_rows($run);
                                    if($count>0)
                                    {
                                        while($result=mysqli_fetch_assoc($run))
                                        {
                                            $id=$result['order_id'];
                                           $fullname=$result['fullname'];
                                           $email=$result['email'];
                                           $status=$result['status'];
                                           $order_date=$result['order_date'];
                                           $payment=$result['payment'];
                                           $total_amount=$result['total_amount'];
                                           ?>
<tr class="checkout-title">
<td><?php echo $sn++; ?></td>
<td><?php echo $fullname; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $order_date; ?></td>
<td>
                            <?php
                                    if($status=='Pending')
                                    {
                                        ?>
                                            <button class="btn badge text-bg-danger mt-2"><?php echo $status; ?></button>   
                                        <?php
                                    }
                                    else if($status=='Processing')
                                    {
                                        ?>
                                            <button class="btn badge text-bg-primary mt-2"><?php echo $status; ?></button>   
                                        <?php
                                    }
                                    else if($status=='Shipped')
                                    {
                                        ?>
                                            <button class="btn badge text-bg-secondary mt-2"><?php echo $status; ?></button>   
                                        <?php
                                    }
                                    else if($status=='Delivered')
                                    {
                                        ?>
                                            <button class="btn badge text-bg-success mt-2"><?php echo $status; ?></button>   
                                        <?php
                                    }
                                    else if($status=='Cancled')
                                    {
                                        ?>
                                            <button class="btn badge text-bg-danger mt-2"><?php echo $status; ?></button>   
                                        <?php
                                    }
                            ?>
                        </td>
<td><?php echo $payment; ?></td>
<td>Rs.<?php echo $total_amount; ?>.00</td>
<td>
<a href="bill.php?order_id=<?php echo $id; ?>" class="btn btn-primary mt-2"><i class="fa-sharp fa-solid fa-eye"></i></a>
<a href="delete-order.php?order_id=<?php echo $id; ?>" class="btn btn-danger mt-2"><i class="fa-sharp fa-solid fa-trash-can"></i></a>
</td>
</tr>
</tbody>
                                           <?php
                                        }
                                    }
                                }
?>
                    </table>
                </div>
        </div>

    </div>
</div>

</div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="alert w-100 text-center p-5 mt-5" role="alert">
                                                        <img src="..\bigstore\assets\img\empty_cart.png" alt="" class="img-fluid" height="200px" width="200px">
                                                        <p class="empty">Woops !! You haven't placed order yet</p>
                                                    </div>
                                            
                                                    <?php
                                                }
                                            }   
        ?>          
        </div>
    </section>


<?php   include('.\partials\footer.php');  ?>  


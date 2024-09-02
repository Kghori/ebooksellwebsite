<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<?php
        if(isset($_GET['order_id']))
        {
                $id=$_GET['order_id'];

                $query="select * from order_detail where order_id='$id'";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    $count=mysqli_num_rows($run);
                    if($count==1)
                    {
                        $result=mysqli_fetch_assoc($run);
                        $id=$result['order_id'];
                        $fullname=$result['fullname'];
                        $email=$result['email'];
                        $date=$result['order_date'];
                        $city=$result['city'];
                        $address=$result['address'];
                        $status=$result['status'];
                        $pincode=$result['pincode'];
                        $country=$result['country'];
                        $phoneno=$result['phoneno'];
                        $payment=$result['payment'];
                        $total_amount=$result['total_amount'];
                    }
                }
        }
        else
        {
            echo "<script>window.location='manage-order.php';</script>";
        }
?>

<section>
        <div class="container mt-5">

            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="manage-order.php" style="text-decoration:none;">
                            <p class="text-danger">Manage Order</p>
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Order</li>
                </ol>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-7">

                    
                    <h4 class="signuptitle">Update Order Status</h4>

                    <p class="signinmsg mt-2">Update Customer Order Status</p>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                            <b class="card-text">Customer Name:</b> 
                                <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Fullname"  value="<?php echo $fullname; ?>" disabled>
                            </div>
                            

                            <div class="form-group col-md-6">
                            <b class="card-text">Customer E-mail:</b> 
                                <input type="email" class="form-control shadow-sm mt-2 mb-2" placeholder="Email Address" value="<?php echo $email; ?>" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                            <b class="card-text">City:</b> 
                                <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="City" value="<?php echo $city; ?>" disabled>
                            </div>
                            

                            <div class="form-group col-md-6">
                            <b class="card-text">Country:</b> 
                                <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Country" value="<?php echo $country; ?>" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                            <b class="card-text">Pincode:</b> 
                                <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Pincode" value="<?php echo $pincode; ?>" disabled>
                            </div>
                            

                            <div class="form-group col-md-6">
                            <b class="card-text">Phone No.:</b> 
                                <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Phone Number" value="<?php echo $phoneno; ?>" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                            <b class="card-text">Payments Method:</b> 
                                <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Payments methods" value="<?php echo $payment; ?>" disabled>
                            </div>
                            

                            <div class="form-group col-md-6">
                            <b class="card-text">Total Amount:</b> 
                            <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Payments methods" value="Rs. <?php echo $total_amount; ?>.00" disabled>
                            </div>
                        </div>

                        <form action="" method="POST">
                        <div class="form-group col-md-12"> 
                        <b class="card-text">Select Status:</b> 
                        <select class="form-select mt-2 mb-2" id="user" name="status">
                                <option value="Pending"
                                <?php
                                        if($status=='Pending')
                                        {
                                            echo "selected";
                                        }
                                ?>
                                >Pending</option>
                                <option value="Processing"
                                <?php
                                        if($status=='Processing')
                                        {
                                            echo "selected";
                                        }
                                ?>
                                >Processing</option>
                                <option value="Shipped"
                                <?php
                                        if($status=='Shipped')
                                        {
                                            echo "selected";
                                        }
                                ?>
                                >Shipped</option>
                                <option value="Delivered"
                                <?php
                                        if($status=='Delivered')
                                        {
                                            echo "selected";
                                        }
                                ?>
                                >Delivered</option>
                                <option value="Cancled"
                                <?php
                                        if($status=='Cancled')
                                        {
                                            echo "selected";
                                        }
                                ?>
                                >Cancled</option>
                        </select>
                        </div>
                       

                        <div class="form-group col-md-12">
                        <b class="card-text">Delivery Address:</b> 
                        <input type="text" class="form-control shadow-sm mt-2 mb-2" placeholder="Delivery Address" value="<?php echo $address; ?>" disabled>
                        </div>

                        <div class="form-group col-md-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" class="form-control shadow-sm mt-3 " value="Update Order" id="btn" name="s1">
                        </div>
                        </form>
                </div>

            </div>
        </div>

        </div>
    </section>

<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>

<?php
        if(isset($_POST['s1']))
        {
            $id=$_POST['id'];
            $status1=$_POST['status'];

            $query="update order_detail set status='$status1' where order_id='$id'";
            $run=mysqli_query($conn,$query);
            if($run==true)
            {
                echo "<script>window.location='manage-order.php';</script>";
                $_SESSION['update']="<p class='validation-green'>Wow!! Order Status updated successfully</p>";
            }
        }
?>
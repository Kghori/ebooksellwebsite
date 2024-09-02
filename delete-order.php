<?php
    include('.\assets\conn\dbconnection.php');

?>

<?php
        $id=$_GET['order_id'];
 
       /* $query1="select * from order_detail where status='Delivered'";
        $run1=mysqli_query($conn,$query1);
        if($run1==true)
        {
            $count=mysqli_num_rows($run1);
            if($count==1)
            {*/
                $query="delete from order_detail where order_id='$id'";
                $run=mysqli_query($conn,$query);
                if($run==true)
                {
                    echo "<script>window.location = 'orders.php';</script>";
                            $_SESSION['delete']='<div class="alert alert-success bg-success mt-4 text-white text-center alert-dismissible fade show" role="alert">
                            <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Order Deleted Successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }
          /*  }
            else
            {
                echo "<script>window.location = 'orders.php';</script>";
                            $_SESSION['delete']='<div class="alert alert-danger bg-danger mt-4 text-white text-center alert-dismissible fade show" role="alert">
                            <i class="fa-sharp fa-solid fa-triangle-exclamation mx-1"></i> Sorry !! your order has been processing so,you cannot delete order.!! you can delete order look order status delivered Or cancled..!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            }
        }*/
?>
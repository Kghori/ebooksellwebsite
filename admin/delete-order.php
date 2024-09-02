<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');

?>

<?php
        $id=$_GET['order_id'];

        $query="delete from order_detail where order_id='$id'";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            echo "<script>window.location = 'manage-order.php';</script>";
                    $_SESSION['delete']='<div class="alert alert-success bg-success text-white text-center alert-dismissible fade show" role="alert">
                    <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Order deleted successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

?>
<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');

?>

<?php
        $id=$_GET['id'];

        $query="delete from bill where id='$id'";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            echo "<script>window.location = 'manage-bill.php';</script>";
                    $_SESSION['delete']='<div class="alert alert-success bg-success text-white text-center alert-dismissible fade show" role="alert">
                    <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Order Bill successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }

?>
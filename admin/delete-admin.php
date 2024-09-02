<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');
    error_reporting(0);
?>

<?php
        $id=$_GET['id'];

        $query="delete from admin where id='$id'";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            echo "<script>window.location='manage-admin.php';</script>";
          $_SESSION['delete']="<p class='validation-red'>Admin Deleted successfully</p>";
        }

?>
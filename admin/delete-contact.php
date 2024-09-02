<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');
    error_reporting(0);
?>

<?php
        $id=$_GET['contact_id'];

        $query="delete from contact where contact_id='$id'";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            echo "<script>window.location='manage-contact.php';</script>";
          $_SESSION['delete']="<p class='validation-red'>Contact Deleted successfully</p>";
        }

?>
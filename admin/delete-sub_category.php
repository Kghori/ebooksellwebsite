<?php

    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');


        $id=$_GET['scategory_id'];

        $query1="select * from product where scategory_id='$id'";
        $run1=mysqli_query($conn,$query1);
        if($run1==true)
        {
            $count=mysqli_num_rows($run1);
            if($count>0)
            {
                 echo "<script>window.location = 'manage-sub_category.php';</script>";
            $_SESSION['delete']="<p class='validation-red'>Sorry !! This sub category name is already exits in product so you can't delete this category. <br> you can delete this category so first delete product this name of sub category.</p>";
            }
            else
        {
            $query="delete from sub_category where scategory_id='$id'";
            $run=mysqli_query($conn,$query);
            if($run==true)
            {
                echo "<script>window.location = 'manage-sub_category.php';</script>";
                $_SESSION['delete']="<p class='validation-red'>Sub Category Deleted Successfully</p>";
            }
            else
            {
                echo "<script>window.location = 'manage-sub_category.php';</script>";
                $_SESSION['delete']="<p class='validation-red'>Failed to delete category</p>";
            }
        }
        }
       
    
       
?>
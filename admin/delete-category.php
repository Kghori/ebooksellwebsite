<?php

    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');


        $id=$_GET['category_id'];
        $image_name=$_GET['category_image'];

        $query1="select * from sub_category where category_id='$id'";
        $run1=mysqli_query($conn,$query1);
        if($run1==true)
        {
            $count=mysqli_num_rows($run1);
            if($count>0)
            {
                echo "<script>window.location = 'manage-category.php';</script>";
            $_SESSION['delete']="<p class='validation-red'>Sorry !! This category name is already exits in sub category so you can't delete this category. <br> you can delete this category so first delete sub category this name of category.</p>";
            }
            else
        {
            if($image_name!="")
        {
                 $path="../assets/img/category/".$image_name;
                $remove=unlink($path);
                if($remove==false)
                {
                    echo "<script>window.location = 'manage-category.php';</script>";
                    $_SESSION['remove']="<p class='validation-red'>Failed to remove category image</p>";
                    die();
                }
        }

        $query="delete from category where category_id='$id'";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            echo "<script>window.location = 'manage-category.php';</script>";
            $_SESSION['delete']="<p class='validation-red'>Category Deleted Successfully</p>";
        }
        else
        {
            echo "<script>window.location = 'manage-category.php';</script>";
            $_SESSION['delete']="<p class='validation-red'>Failed to delete category</p>";
        }
        }
        }

        
?>
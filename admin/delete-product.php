<?php

    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');


        $id=$_GET['product_id'];
        $image_name=$_GET['product_image'];

        if($image_name!="")
        {
                 $path="../assets/img/product/".$image_name;
                $remove=unlink($path);
                if($remove==false)
                {
                    echo "<script>window.location='manage-product.php';</script>";
                    $_SESSION['remove']="<p class='validation-red'>Failed to remove product image</p>";
                    die();
                }
        }

        $query="delete from product where product_id='$id'";
        $run=mysqli_query($conn,$query);
        if($run==true)
        {
            echo "<script>window.location = 'manage-product.php';</script>";
            $_SESSION['delete']="<p class='validation-red'>Product Deleted Successfully</p>";
        }
        else
        {
            echo "<script>window.location = 'manage-product.php';</script>";
            $_SESSION['delete']="<p class='validation-red'>Failed to delete category</p>";
        }

       

        


?>
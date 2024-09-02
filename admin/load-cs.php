<?php

        include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');

        if($_POST['type']=="")
        {
            $query="select * from category where active='yes'";
            $run=mysqli_query($conn,$query) or die("unsuccessfull");
            if($run==true)
            {
                $count=mysqli_num_rows($run);
                if($count>0)
                {
                    $str="";
                    while($result=mysqli_fetch_assoc($run))
                    {
                        $str.="<option value='{$result['category_id']}'>{$result['category_name']}</option>";
                    }
                    
                }
            }
        }
        else if($_POST['type']=="subcdata")
        {
            $query="select * from sub_category where category_id={$_POST['id']} AND active='yes'";
            $run=mysqli_query($conn,$query) or die("unsuccessfull");
            if($run==true)
            {
                $count=mysqli_num_rows($run);
                if($count>0)
                {
                    $str="";
                    while($result=mysqli_fetch_assoc($run))
                    {
                        $str.="<option value='{$result['scategory_id']}'>{$result['sub_category_name']}</option>";
                    }
                    
                }
            }
        }

       
        echo $str;
?>
<?php
    include('.\assets\conn\dbconnection.php');
   

    include('userlogin-check.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">-->
    <link rel="stylesheet" href=".\assets\flickity\flickity.min.css">

    <script src=".\assets\jquery.min.js"></script>
    <link rel="website icon" type="png" href="./assets/img/websiteicon.png">
    <link rel="stylesheet" href=".\assets\font\fontawesome-free-6.2.0-web\css\all.css">
    <link rel="stylesheet" href="assets\Bootstrap\css\bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href=".\assets\css\d4.css">

    <style>
            .dropdown-menu li
            {
                position: relative;
            }
            .dropdown-menu .submenu
            {
                display:none;
                position: absolute;
                left:100%;
                top:-7px;
            }
            .dropdown-menu>li:hover>.submenu
            {
                display:block;
            }
            
    </style>
    <title>customer Navbar</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand"><img src="..\bigstore\assets\img\logo.png" alt="" width="130"
                    height="30"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="cindex.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                shop
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="allproducts.php">All Products</a></li>
                                <?php
            $query="select * from category where active='Yes'";
            $run=mysqli_query($conn,$query);
            $sn=1;
            if($run==true)
            {
              $count=mysqli_num_rows($run);
              if($count>0)
              {
                while($result=mysqli_fetch_assoc($run))
                {
                  $id=$result['category_id'];
                  $cname=$result['category_name'];
                  ?>
                                <li><a class="dropdown-item" href="products.php?category_id=<?php echo $id; ?>">
                                        <?php echo $cname; ?>
                                    </a></li>
                                <?php
                }
              }
            }
          ?>
                            </ul>
                        </div>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping position-relative mt-2 mx-2">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    id="carticon">
                                    <?php
                                        $user_id=$_SESSION['id'];                       
            $query="select * from cart where user_id='$user_id'";
            $run=mysqli_query($conn,$query);
            if($run==true)
            {
               
                if($total=mysqli_num_rows($run))
                {
                        ?>
                                    <?php echo  $total; ?>
                        <?php
                }
                else
                {
                    echo "0";
                }
            }
        ?>
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </i></a>
                    </li>
                </ul>

                <span>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <span style="font-family:Bahnschrift;font-size:15px;color:#0065bd;">Welcome,
                            <?php
                                           $user_id=$_SESSION['id'];            
                                           $query="select * from customer where id='$user_id'";
                                           $run=mysqli_query($conn,$query);
                                           if($run==true)
                                           {
                                            $count=mysqli_num_rows($run);
                                            if($count==1)
                                            {
                                                while($result=mysqli_fetch_assoc($run))
                                                {
                                                    $id=$result['id'];
                                                    $fullname=$result['fullname'];
                                                    ?>
                                                <?php echo $fullname; ?>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="myaccount.php">My Account</a></li>
                            <li><a class="dropdown-item" href="orders.php">My Orders</a></li>
                            <li><a class="dropdown-item" href="userlogout.php">Logout<i class="fa-sharp fa-solid fa-right-from-bracket mx-2"></i></a></li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>
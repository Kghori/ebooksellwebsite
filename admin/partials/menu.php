<?php
    include('C:\xampp\htdocs\bigstore\assets\conn\dbconnection.php');
    include('login-check.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">-->
  <link rel="stylesheet" href="..\assets\flickity\flickity.min.css">
  <link rel="website icon" type="png" href="./assets/img/websiteicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="..\assets\font\fontawesome-free-6.2.0-web\css\all.css">
  <link rel="stylesheet" href="..\assets\Bootstrap\css\bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <link rel="stylesheet" href="..\assets\css\s4.css">
  <script>
        function admin() {
            window.location = "manage-admin.php";
        }
        function customer() {
            window.location = "manage-customer.php";
        }
        function category() {
            window.location = "manage-category.php";
        }
        function product() {
            window.location = "manage-product.php";
        }
        function order() {
            window.location = "manage-order.php";
        }
        function subcategory() {
            window.location = "manage-sub_category.php";
        }
        function bill() {
            window.location = "manage-bill.php";
        }
    </script>
  
  <title>Admin Panel</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a href="index.php" class="navbar-brand"><img src="..\assets\img\logo.png" alt="" width="130"
          height="30"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-admin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-customer.php">Customer</a>
          </li>
          <li class="nav-item">
          <div class="dropdown">
              <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="manage-category.php">Add Category</a></li>
                        <li><a class="dropdown-item" href="manage-sub_category.php">Add Sub Category</a></li>
                      </ul>
                    </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="manage-product.php">Product</a>
          </li>

          <li class="nav-item">
          <div class="dropdown">
              <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Orders</a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="manage-order.php">Order Details</a></li>
                        <li><a class="dropdown-item" href="manage-bill.php">Bill Details</a></li>
                      </ul>
                    </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-contact.php">Contact</a>
          </li>
        </ul>
        <span class="navbar-text">
        <a class="btn btn-danger text-white" href="logout.php">Logout<i class="fa-sharp fa-solid fa-right-from-bracket mx-2"></i></a>
        </span>
      </div>
    </div>
  </nav>
</body>
</html>
<?php  include('.\partials\menu.php');  ?>

<section id="about">
        <div class="container p-1">
        
        <div class="stronghold-heading1">
                <div class="heading-subtitle1">
                    <span class="heading-sep-front1"></span>
                    <span class="heading-subtitle-span1">Order Summary</span>
                    <span class="heading-sep-front1"></span>
                </div>
            </div>

            <div class="row gy-3 mt-3 mb-5 justify-content-center">

                <div class="col-lg-7 col-md-12">
                    <div class="card" id="cart">
                        <h5 class="card-header">Basic Details</h5>
                        <?php
                   
                                              $user_id=$_SESSION['id'];   
                                              $query2="select * from customer where id='$user_id'";
                                              $run2=mysqli_query($conn,$query2);
                                              if($run2==true)
                                              {
                                                  $result2=mysqli_fetch_assoc($run2);
                                                  $userid=$result2['id'];
                                                  $fullname=$result2['fullname'];
                                                  $email=$result2['email'];
                                              }       
                        ?>
                        <div class="card-body">
                              
                        <form action="" method="POST" onSubmit="return validateform()" name="frmuserreg" >
                            <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <b class="card-text">Fullname*</b>
                                <input type="text" class="form-control shadow-sm mb-2" placeholder="Fullname" value="<?php echo $fullname; ?>" required  disabled>
                            </div>
            
                            <div class="form-group col-md-6">
                            <b class="card-text">Email*</b>
                                <input type="text" class="form-control shadow-sm  mb-2" placeholder="Email Address" value="<?php echo $email; ?>" required disabled>
                            </div>
                             </div>

                             <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                            <b class="card-text">City Name*</b>
                                <input type="text" class="form-control shadow-sm  mb-2" placeholder="City"   name="t1" >
                            </div>

                            <div class="form-group col-md-6">
                            <b class="card-text">Country Name*</b>
                                <input type="text" class="form-control shadow-sm  mb-2" placeholder="Country"   name="t2">
                            </div>
                             </div>

                             <div class="row justify-content-center">
                             <div class="form-group col-md-6">
                            <b class="card-text">Pin code*</b>
                                <input type="text" class="form-control shadow-sm  mb-2" placeholder="Pincode"  name="t3">
                            </div>
            
                            <div class="form-group col-md-6">
                            <b class="card-text">Phone Number*</b>
                                <input type="text" class="form-control shadow-sm  mb-2" placeholder="Phone Number"  name="t4">
                            </div>
                             </div>


                             <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <b class="card-text">Delivery Address*</b>
                                <input type="text" class="form-control shadow-sm  mb-2" placeholder="Delivery Address"  name="t5">
                            </div>

                            <div class="form-group col-md-12 ">
                            <b class="card-text">Select Payments Methods*</b>
                            <div class="form-check mt-3">
  <input class="form-check-input" type="radio" name="t6" id="flexRadioDefault1" value="Cash On Deliery">
  <label class="form-check-label" for="flexRadioDefault1">
    <b class="checkout-header">Cash On Delivery</b>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="t6" id="flexRadioDefault2" disabled value="UPI Payments">
  <label class="form-check-label" for="flexRadioDefault2">
  <b class="checkout-header">UPI Payments <img src="..\bigstore\assets\img\upi-logo.png" class="img-fluid mx-2" height="30px" width="30px" alt=""></b>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="t6" id="flexRadioDefault2" disabled value="Phone Pay">
  <label class="form-check-label" for="flexRadioDefault2">
  <b class="checkout-header">Phone Pay<img src="..\bigstore\assets\img\PhonePe-Logo.wine.png" class="img-fluid mx-2" height="45px" width="45px" alt=""></b>
  </label>
</div>
                            </div>
                             </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12">
                    <div class="card" id="cart">
                        <h5 class="card-header">Order Details<b class="float-end">(<?php echo $total; ?> Items )</b></h5>
                        <div class="card-body">
                        <div class="wrapper">
                        <table class="table table-sm table-borderless">
  <thead  class="checkout-header">
    <tr>
    <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php
                 $user_id=$_SESSION['id'];
 
                 $query="select * from cart where user_id='$user_id'";
                 $run=mysqli_query($conn,$query);
                 if($run==true)
                 {
                     $count=mysqli_num_rows($run);
                     if($count>0)
                     {
                        $totalprice=0;
                         while($result=mysqli_fetch_assoc($run))
                         {
                             $id=$result['id'];
                             $pname=$result['pname'];
                             $pimage=$result['pimage'];
                             $price=$result['price'];
                             $qty=$result['quantity'];
                             $mrp=$result['mrp'];

                             $price1=$price*$qty;
                             $totalprice=$price1+$totalprice;
                             ?>
                            <input type="hidden" name="pname[]" value="<?php echo $pname; ?>">
                            <input type="hidden" name="qty[]" value="<?php echo $qty; ?>">
                            <input type="hidden" name="mrp[]" value="<?php echo $mrp; ?>">
                            <input type="hidden" name="price[]" value="<?php echo $price; ?>">
    <tr class="checkout-title">
       <td>
       <?php
                if($pimage!="")
                {
                    ?>
                    <img src="./assets/img/product/<?php echo $pimage; ?>" class="img-fluid" alt="..."
                        width="60px;" height="60px;">
                    <?php
                }
                else
                {
                    echo "<p class='validation-red text-center mt-5 p-3 '>product Image Not Added</p>";
                }
                ?>
       </td>
    <td><?php echo $pname; ?></td>
    <td><?php echo $qty; ?></td>
    <td><?php echo $price; ?></td>
    </tr>
                             <?php
                         }
                    }
                }
    ?>
  </tbody>

  <thead>
    <tr class="checkout-header">
     <th colspan="3">Total Amounts</th>
     <th >Rs.<?php echo $totalprice; ?>.00</th>
    </tr>
  </thead>
</table>
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                        <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="total_amount" value="<?php echo $totalprice; ?>">
                        <button class="btn w-100" id="btn" name="s1">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>

<?php   include('.\partials\footer.php');  ?>

<?php
                    if(isset($_POST['s1']))
                    {
                        $uid=$_POST['userid'];
                        $fn=$_POST['fullname'];
                        $e1=$_POST['email'];
                        $city=$_POST['t1'];
                        $status="Pending";
                        $country=$_POST['t2'];
                        $pincode=$_POST['t3'];
                        $phone=$_POST['t4'];
                        $address=$_POST['t5'];
                        $pm=$_POST['t6'];
            
                        $pro_name=$_POST['pname'];
                        $pro_name1=implode(",",$pro_name);
            
                        $pro_qty=$_POST['qty'];
                        $pro_qty1=implode(',',$pro_qty);
            
                        $pro_mrp=$_POST['mrp'];
                        $pro_mrp1=implode(',',$pro_mrp);
            
                        $pro_price=$_POST['price'];
                        $pro_price1=implode(',',$pro_price);
            
                        $total_amount=$_POST['total_amount'];
                        
                        $order_date=date('Y-m-d');
            
                        $query="insert into order_detail(fullname,email,order_date,status,address,city,pincode,country,phoneno,payment,user_id,product_name,quantity,mrp,price,total_amount) values('$fn','$e1','$order_date','$status','$address','$city','$pincode','$country','$phone','$pm','$uid','$pro_name1','$pro_qty1','$pro_mrp1','$pro_price1','$total_amount')";
                        $run=mysqli_query($conn,$query);
                        if($run==true)
                        {
                            echo "<script>window.location = 'orders.php';</script>";
                                $_SESSION['order']='<div class="alert alert-success bg-success mt-4 text-white text-center alert-dismissible fade show" role="alert">
                                <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Order Placed Successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                        }
            
                        $query4="insert into bill(fullname,order_date,address,city,pincode,country,phoneno,payment,user_id,product_name,quantity,mrp,price,total_amount) values('$fn','$order_date','$address','$city','$pincode','$country','$phone','$pm','$uid','$pro_name1','$pro_qty1','$pro_mrp1','$pro_price1','$total_amount')";
                        $run4=mysqli_query($conn,$query4);
                        if($run4==true)
                        {
                            echo "<script>window.location = 'orders.php';</script>";
                                $_SESSION['order']='<div class="alert alert-success bg-success mt-4 text-white text-center alert-dismissible fade show" role="alert">
                                <i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Order Placed Successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                        }
            
                        $query2="delete from cart where user_id='$user_id'";
                        $run2=mysqli_query($conn,$query2);
                        if($run2==true)
                        {
                           echo "";
                        }
                    }
            
        
?>

<script type="application/javascript">

    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
    var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

    function validateform()
    {
        if(document.frmuserreg.t1.value == "")
        {
            alert("Cityname should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(!document.frmuserreg.t1.value.match(alphaspaceExp))
        {
            alert("Cityname should be in character.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t2.value == "")
        {
            alert("Countryname should not be empty.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(!document.frmuserreg.t2.value.match(alphaspaceExp))
        {
            alert("Countryname should be in character.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t3.value == "")
        {
            alert("Pincode should not be empty.!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(!document.frmuserreg.t3.value.match(numericExpression))
        {
            alert("Enter Pincode Only numeric.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t4.value == "")
        {
            alert("Phone Number should not be empty.!");
            document.frmuserreg.t4.focus();
            return false;
        }
        else if(!document.frmuserreg.t4.value.match(numericExpression))
        {
            alert("Enter Phone number Only numeric.!");
            document.frmuserreg.t1.focus();
            return false;
        }
        else if(document.frmuserreg.t4.value.length < 10)
        {
            alert("Phone number has been incorrected..!!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(document.frmuserreg.t4.value.length > 10)
        {
            alert("Phone number has been incorrected..!!");
            document.frmuserreg.t3.focus();
            return false;
        }
        else if(document.frmuserreg.t5.value == "")
        {
            alert("Delivery address should not be empty.!");
            document.frmuserreg.t4.focus();
            return false;
        }
        else if(document.frmuserreg.t6.value == "")
        {
            alert("please select payments methods..!!");
            document.frmuserreg.t1.focus();
            return false;
        }
    }
</script>





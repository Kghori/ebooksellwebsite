<?php  include('.\partials\menu.php');  ?>

<?php
      if(isset($_GET['order_id']))
      {
          $id=$_GET['order_id'];
          $query="select * from order_detail where order_id='$id'";
          $sn=1;
          $run=mysqli_query($conn,$query);
          if($run==true)
          {
            $count=mysqli_num_rows($run);
            if($count==1)
            {
              while($result=mysqli_fetch_assoc($run))
              {
                $id=$result['order_id'];
                $fullname=$result['fullname'];
                $city=$result['city'];
                $pincode=$result['pincode'];
                $country=$result['country'];
                $phone=$result['phoneno'];
                $address=$result['address'];
                $order_date=$result['order_date'];
                $payment=$result['payment'];
                $pro_name=$result['product_name'];
                $qty=$result['quantity'];
                $mrp=$result['mrp'];
                $price=$result['price'];
                $total_amount=$result['total_amount'];
              }
            }
          }
      }
      else
      {
        echo "<script>window.location='orders.php';</script>";
      }
?>

<section>
  <div class="container p-1 mt-3">
    <div class="row justify-content-center mt-5 mb-5" id="invoice">
      <div class="col-md-10">
        <div class="wrapper">
          <table class="table">
            <thead class="bill-text text-center">
              <tr>
                <td colspan="5">
                  <b class="card-text"><i class="fa-sharp fa-solid fa-circle-check mx-1"></i> Your Ordered Products Details</b> <br>
              </tr>
            </thead>

            <thead class="card-text">
              <tr>
                <td colspan="4">
                  <b>Customer Name: </b> <?php echo $fullname; ?><br>
                  <b>Address: </b><?php echo $address.', '.$city.','.$country; ?><br>
                  <b>Mobile No.: </b> <?php echo $phone; ?>
                </td>
                <td>date: <?php echo $order_date; ?><br>
                  City Pincode: <?php echo $pincode; ?><br>
                  Payment Mode: <?php echo  $payment;  ?>
                </td>
              </tr>
            </thead>
            <thead>
              <tr class="bill-header">
                <th scope="col">Sr.No.</th>
                <th scope="col">Product Name</th>
                <th scope="col">Qauntity</th>
                <th scope="col">MRP</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody class="bill-text">
              <tr>
                <td>
                <?php $product_name=explode(',',$pro_name); 
                       foreach($product_name as $i)
                      {  
                        echo $sn++,"<br>";
                       } 
                ?>
                </td>
                <td>
                <?php $product_name=explode(',',$pro_name); 
                       foreach($product_name as $i)
                      {  
                          echo $i,"<br>";
                       } 
                ?>
               </td>

               <td>
                <?php $product_qty=explode(',',$qty); 
                       foreach($product_qty as $i)
                      {  
                          echo $i,"<br>";
                       } 
                ?>
               </td>

               <td>
                <?php $product_mrp=explode(',',$mrp); 
                       foreach($product_mrp as $i)
                      {  
                          echo $i,".00<br>";
                       } 
                ?>
               </td>

               <td>
                <?php $product_price=explode(',',$price); 
                       foreach($product_price as $i)
                      {  
                          echo $i,".00<br>";
                       } 
                ?>
               </td>
               
              </tr>
            </tbody>
            <thead class="card-text table-group-divider">
              <tr>
                <th scope="col"></th>
                <th scope="col">Total Amounts:</th>
                <th scope="col">
               <?php
                    print_r(array_sum(explode(',',$qty)));
               ?>
                </th>
                <th scope="col">--</th>
                <th scope="col">Rs.<?php echo $total_amount; ?>.00</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php   include('.\partials\footer.php');  ?>
<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<?php
      if(isset($_GET['id']))
      {
          $id=$_GET['id'];
          $query="select * from bill where id='$id'";
          $sn=1;
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

<section id="about">
  <div class="container p-1">
    <div class="row justify-content-center" id="invoice">
      <div class="col-md-10">

        <form action="" id="myfrm">
          <div class="wrapper">
            <table class="table table-bordered mt-5">
              <thead class="bill-text text-center">
                <tr>
                  <td colspan="5">
                    <img src="..\assets\img\logo.png" alt="" height="30px" width="120px"
                      class="img-fluid mb-1 mt-2 mx-2"> <br>
                    <b class="card-text">Paliyad Road,botad,India,364710</b> <br>
                </tr>
              </thead>

              <thead class="card-text">
                <tr>
                  <td colspan="4">
                    <b>Customer Name: </b>
                    <?php echo $fullname; ?><br>
                    <b>Address: </b>
                    <?php echo $address.', '.$city.','.$country; ?><br>
                    <b>Mobile No. </b>
                    <?php echo $phone; ?>
                  </td>
                  <td>date:
                    <?php echo $order_date; ?><br>
                    Bill No.:
                    <?php echo $id; ?><br>
                    Payment Mode:
                    <?php echo  $payment;  ?>
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
                          echo $i,"<br>";
                       } 
                ?>
                  </td>

                  <td>
                    <?php $product_price=explode(',',$price); 
                       foreach($product_price as $i)
                      {  
                          echo $i,"<br>";
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
                  <th scope="col" class="text-center">--</th>
                  <th scope="col">Rs.
                    <?php echo $total_amount; ?>.00
                  </th>
                </tr>
              </thead>
              <thead class="bill-text">
                <tr>
                  <td colspan="5">
                    <p class="p-2"> Terms & condition: <br>
                      Fixed Rate!! No Refunf!! No Exchange!! No Guarantee!! Good once sold will not be taken back.</p>
                  </td>
                </tr>
              </thead>
            </table>
          </div>
        </form>

     <button class="btn float-end" id="btn" onclick="myprint(myfrm)">Print</button>

      </div>
    </div>
  </div>
</section>

<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
  integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

  /*window.jsPDF = window.jspdf.jsPDF;
          function generatePdf() {
              let jsPdf = new jsPDF('p', 'pt', 'letter');
              var htmlElement = document.getElementById('myfrm');
              // you need to load html2canvas (and dompurify if you pass a string to html)
              const opt = {
                  callback: function (jsPdf) {
                      jsPdf.save("Test.pdf");
                      // to open the generated PDF in browser window
                      // window.open(jsPdf.output('bloburl'));
                  },
                  margin: [72, 72, 72, 72],
                  autoPaging: 'text',
                  html2canvas: {
                      allowTaint: true,
                      dpi: 300,
                      letterRendering: true,
                      logging: false,
                      scale: .8
                  }
              };
  
              jsPdf.html(htmlElement, opt);
          }*/

  function myprint(myfrm) {
    var printdata = document.getElementById(myfrm);
    newwin = window.open(" ");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();
  }


  function myprint(myfrm) {
    const element = document.getElementById("invoice");

    html2pdf()
      .from(element)
      .save();
  }


</script>
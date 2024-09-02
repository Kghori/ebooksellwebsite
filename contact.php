<?php  include('.\partials\menu.php');  ?>

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

<section id="about">
        <div class="container p-1">

            <div class="stronghold-heading">
                <div class="heading-subtitle">
                    <span class="heading-sep-front"></span>
                    <span class="heading-subtitle-span">Quick support</span>
                    <span class="heading-sep-front"></span>
                </div>
            </div>

            <h2 class="titlename mb-4">Contact Us</h2>

            <div class="row mb-4">
            <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

?>
                <p class="text-center">If you have any questions or comments about our services contact us using the
                    form and we be sure to
                    get back to you.</p>

                    <section id="about">
                        <div class="container mb-4">
                          <div class="row p-2">
                            <div class="col-lg-6 p-2">
                              <div class="page-contact">
                                <p>Need to get in touch? No problem! You can use our contact form to send us a message.</p>
                              </div>
                    
                              <div class="support-contact">
                                <ul>
                                  <li>
                                    <p>Need a support? Check our available support options.</p>
                                  </li>
                                  <li>
                                    <p>Want to remove the back links to Grocerystor? Check our available licensing options</p>
                                  </li>
                                  <li>
                                    <p>If you have any questions now send message in contact us.this answers will be send in email</p>
                                  </li>
                    
                                </ul>
                              </div>
                            </div>
                    
                            <div class="col-lg-6">                           
                            <form action="" method="POST">
                
                            <div class="row">

<div class="form-group col-md-6">
  <input type="text" class="form-control shadow-sm mt-3" placeholder="Your Name" value="<?php echo $fullname; ?>" disabled>
</div>

<div class="form-group col-md-6">
  <input type="email" class="form-control shadow-sm mt-3" placeholder="Your Email" value="<?php echo $email; ?>" disabled>
</div>
</div>

<div class="form-group col-md-12">
<input type="text" class="form-control shadow-sm mt-3" placeholder="Subject" name="t3" required>
</div>

<div class="form-group col-md-12">
<textarea rows="5" class="form-control shadow-sm mt-3" placeholder="Message" name="t4" required></textarea>
</div>

<div class="form-group col-md-12">
<input type="submit" value="Send Message" class="btn shadow-sm mt-3" id="btn" name="s1">
<input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">
</div>
                            </form>
                            </div>
                          </div>
                          
                    
                        </div>
                      </section>


            </div>
        </div>
    </section>

<?php   include('.\partials\footer.php');  ?>  

<?php
      if(isset($_POST['s1']))
      {
          $fullname=$_POST['fullname'];
          $email=$_POST['email'];
          $subject=$_POST['t3'];
          $message=$_POST['t4'];
          $userid=$_SESSION['id'];     

          $query="insert into contact(fullname,email,subject,message,user_id) values('$fullname','$email','$subject','$message','$userid')";
          $run=mysqli_query($conn,$query);
          if($run==true)
          {
              echo "<script>window.location='contact.php'</script>";
              $_SESSION['add']="<p class='validation-green text-center'>wow !! Your message sending successfully</p>";
          }
      }
?>
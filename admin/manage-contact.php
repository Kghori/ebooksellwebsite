<?php  include('C:\xampp\htdocs\bigstore\admin\partials\menu.php');  ?>

<section>
    <div class="container">

        <div class="stronghold-heading">
            <div class="heading-subtitle">
                <span class="heading-sep-front"></span>
                <span class="heading-subtitle-span">Manage Contact</span>
                <span class="heading-sep-front"></span>
            </div>
            <?php
                                if(isset($_SESSION['delete']))
                                {
                                    echo $_SESSION['delete'];
                                    unset($_SESSION['delete']);
                                }
                        ?>
        </div>

        <div class="row mt-3">
                <div class="col-12">
                        <div class="card" id="cart">
                        <h5 class="card-header">Contact Details</h5>
                        <div class="card-body">
                            <table class="table  table-borderless">
                                <?php
                                        $query="select * from contact";
                                        $run=mysqli_query($conn,$query);
                                        if($run==true)
                                        {
                                            $count=mysqli_num_rows($run);
                                            if($count>0)
                                            {
                                                while($result=mysqli_fetch_assoc($run))
                                                {
                                                    $contact_id=$result['contact_id'];
                                                    $fullname=$result['fullname'];
                                                    $email=$result['email'];
                                                    $subject=$result['subject'];
                                                    $message=$result['message'];
                                                    ?>
<tr>
                                        <td>
                                        <p><b>Username</b>: <?php echo $fullname; ?>    
                                <b>Email</b> : <?php echo $email; ?> <br>  <a href="delete-contact.php?contact_id=<?php echo $contact_id; ?>"  class="btn btn-danger float-end">Delete</a>
                                 <b>subject</b> : <?php echo $subject; ?> <br>
                                <b>Message</b> : <?php echo $message; ?> <br>
                              
                                        </td>
                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <td colspan="6"> <div class="alert w-100 text-center" role="alert">
                                          <img src="\bigstore\assets\img\empty_cart.png" alt="" class="img-fluid" height="180px" width="180px">
                                          <p class="empty mt-3">No contact available..!</p>
                                    </div> </td>
                                                <?php
                                            }
                                        }
                                ?>
                            </table>
                               
                            </p>
                        </div>
                        </div>
                </div>
        </div>

    </div>
</section>

<?php  include('C:\xampp\htdocs\bigstore\admin\partials\footer.php');  ?>
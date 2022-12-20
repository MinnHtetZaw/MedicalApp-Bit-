

  <?php 
include('headerlogin.php');

if (isset($_POST['btnconfirm']))
{
    $staffid=$_POST['txtstaffid'];
    $staffname=$_POST['txtstaffname'];
    
    $staffphno=$_POST['txtstaffphno'];
    $staffaddress=$_POST['txtstaffaddress'];

    $staffemail=$_POST['txtstaffemail'];  
    $staffusername=$_POST['txtstaffusername'];
    $staffpassword=$_POST['txtstaffpassword'];

    $insert="INSERT INTO staff VALUES('$staffid','$staffname','$staffphno','$staffaddress','$staffemail','$staffusername','$staffpassword')";
   $result=mysqli_query($connect,$insert);
   if($result)
   {
    echo "<script>alert('Register Completed.');window.location.assign('login.php')</script>";
    }
    else
    {
      echo "Incomplete.";
    }
}
 ?>
  
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Staff Register</span></h1>
                        <h3 class="title wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">Sign Up for <span>Staff</span> </h3>
                        <form action="staff.php" method="POST">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo AutoID('staff','staffid','S_',6); ?>" type="text" name="txtstaffid" class="form-control"  placeholder="Staff ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtstaffname" class="col-xl-6" id="exampleInputName" placeholder="Enter Staff Name" required>
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtstaffphno" class="form-control" id="exampleInputPhno" placeholder="Enter Staff's Phone No" required >
                            </div>
                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtstaffaddress" class="form-control" id="exampleInputAddress" placeholder="Enter Staff's Address" required >
                            </div>

                             

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="email" name="txtstaffemail" class="form-control" id="exampleInputUserName" placeholder="Enter Staff's Email" required="">
                            </div>

                             <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtstaffusername" class="form-control" id="exampleInputUserName" placeholder="Enter Username" required >
                            </div>
                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="password" name="txtstaffpassword" class="form-control" id="exampleInputPassword" placeholder="Enter Password" required >
                            </div>

                            <input type="submit" name="btnconfirm" value="Confirm" class="btn btn-default wow bounceIn" style="float: left;">
                           <input type="reset" name="" value="cancel" class="btn btn-default wow bounceIn" style="float: right;">
                           <br>
                           <br>


                           <a href="login.php">Back to Login Page</a>
                        </form>
                     <!--  -->
                    

                     <!--  -->
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- #contact-us close -->

    <?php 
    include('footer.php');
     ?>
  
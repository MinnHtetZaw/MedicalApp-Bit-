

  <?php 
include('headerlogin.php');

if (isset($_POST['btnconfirm']))
{
    $patientid=$_POST['txtpatientid'];
    $patientname=$_POST['txtpatientname'];
    $patientage=$_POST['txtpatientage'];
    $patientgender=$_POST['rdogender'];
    $patientphno=$_POST['txtpatientphno'];
    $patientaddress=$_POST['txtpatientaddress'];
    $patientnrc=$_POST['txtpatientnrc'];
    $patientemail=$_POST['txtpatientemail'];  
    $patientusername=$_POST['txtpatientusername'];
    $patientpassword=$_POST['txtpatientpassword'];
    $insert="INSERT INTO patient VALUES('$patientid','$patientname','$patientage','$patientgender','$patientphno','$patientaddress','$patientnrc','$patientemail','$patientusername','$patientpassword')";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Patient Register</span></h1>
                        <h3 class="title wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">Sign Up for <span>Patient</span> </h3>
                        <form action="patient.php" method="POST">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo AutoID('patient','patientid','P_',6); ?>" type="text" name="txtpatientid" class="form-control"  placeholder="Patient ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtpatientname" class="col-xl-6" id="exampleInputName" placeholder="Enter Patient Name" required>
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtpatientage"  id="exampleInputEmail" placeholder="Enter Customer's Age" required="">
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">

                              Gender

                                <input  type="radio" name="rdogender" value="Male" checked/> Male
                          

                                <input  type="radio" name="rdogender" value="Female" checked/> Female
                                

                            </div>





                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtpatientphno" class="form-control" id="exampleInputPhno" placeholder="Enter Patient's Phone No" required >
                            </div>
                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtpatientaddress" class="form-control" id="exampleInputAddress" placeholder="Enter Patient's Address" required >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtpatientnrc" class="form-control" id="exampleInputUserName" placeholder="Enter Patient's NRC " required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="email" name="txtpatientemail" class="form-control" id="exampleInputUserName" placeholder="Enter Patient's Email" required="">
                            </div>

                             <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtpatientusername" class="form-control" id="exampleInputUserName" placeholder="Enter Username" required >
                            </div>
                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="password" name="txtpatientpassword" class="form-control" id="exampleInputPassword" placeholder="Enter Password" required >
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
  
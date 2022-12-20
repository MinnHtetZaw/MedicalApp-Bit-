

  <?php 
include('header1.php');

 if(isset($_GET['pid']))
{
  $pid=$_GET['pid'];
   $delete="Select * from patient where patientid='$pid'";
   $ret=mysqli_query($connect,$delete);
   $row=mysqli_fetch_array($ret);

     $pid=$row['patientid'];
     $pname=$row['patientname'];
     $page=$row['patientage'];
     
     $pphno=$row['patientphno'];
     $paddress=$row['patientaddress'];
     $pnrc=$row['patientNRC'];
     $pemail=$row['patientemail'];
     $pusername=$row['patientusername'];
     $password=$row['patientpassword'];

 }


if (isset($_POST['btnupdate']))
{
    $patientid=$_POST['txtpatientid'];
    $patientname=$_POST['txtpatientname'];
    $age=$_POST['txtpatientage'];
    $gender=$_POST['rdogender'];
    $phno=$_POST['txtpatientphno'];
    $address=$_POST['txtpatientaddress'];
    $nrc=$_POST['txtpatientnrc'];
    $email=$_POST['txtpatientemail'];
    $username=$_POST['txtpatientusername'];
    $ppassword=$_POST['txtpassword'];

   

    $sql="
            Update patient
            set 
                 patientname='$patientname',
                 patientage='$age',
                 patientgender='$gender',
                 patientphno='$phno',
                 patientaddress='$address',
                 patientNRC='$nrc',
                 patientemail='$email',
                 patientusername='$username',
                 patientpassword='$ppassword'
                
                where patientid='$patientid'
            ";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
    echo "<script>alert('Update Completed.');window.location.assign('pinfo.php')</script>";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Patient Info Update</span></h1>
                    
                        <form action="pinfoupdate.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo $pid?>" type="text" name="txtpatientid" class="form-control"  placeholder="Patient ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $pname?>" name="txtpatientname" class="col-xl-6" id="exampleInputName" placeholder="Enter Patient Name" required>
                            </div>



                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $page?>" name="txtpatientage" class="form-control" id="exampleInputPhno" placeholder="Enter Age" required >
                            </div>


                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">

                              Gender

                                <input  type="radio" name="rdogender" value="Male" checked/> Male
                          

                                <input  type="radio" name="rdogender" value="Female" checked/> Female
                                

                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $pphno?>" name="txtpatientphno" class="form-control" id="exampleInputAddress" placeholder="Enter Ph no" required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $paddress?>" name="txtpatientaddress" class="form-control" id="exampleInputAddress" placeholder="Enter Address " required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $pnrc?>" name="txtpatientnrc" class="form-control" id="exampleInputAddress" placeholder="Enter Patient's NRC" required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $pemail?>" name="txtpatientemail" class="form-control" id="exampleInputAddress" placeholder="Enter Patient's Email" required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $pusername?>" name="txtpatientusername" class="form-control" id="exampleInputAddress" placeholder="Enter Username" required >
                            </div>
                            
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="password" value="<?php echo $password?>" name="txtpassword" class="form-control" id="exampleInputAddress" placeholder="Enter Username" required >
                            </div>

                            <br>
                            <br>

  
                  

                              

                            <input type="submit" name="btnupdate" value="Confirm" class="btn btn-default wow bounceIn" style="float: left;">
                           <input type="reset" name="" value="cancel" class="btn btn-default wow bounceIn" style="float: right;">
                           <br>
                           <br>


                           
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
  
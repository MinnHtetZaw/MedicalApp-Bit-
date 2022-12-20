

  <?php 
include('header2.php');

 if(isset($_GET['sid']))
{
  $sid=$_GET['sid'];
   $delete="Select * from staff where staffid='$sid'";
   $ret=mysqli_query($connect,$delete);
   $row=mysqli_fetch_array($ret);

     $sid=$row['staffid'];
     $sname=$row['staffname'];
     
     $sphno=$row['staffphno'];
     $saddress=$row['staffaddress'];

     $semail=$row['staffemail'];
     $susername=$row['staffusername'];

 }


if (isset($_POST['btnupdate']))
{
    $staffid=$_POST['txtstaffid'];
    $name=$_POST['txtstaffname'];
    
    $phno=$_POST['txtstaffphno'];
    $address=$_POST['txtstaffaddress'];
    
    $email=$_POST['txtstaffemail'];
    $username=$_POST['txtstaffusername'];

   

    $sql="
            Update staff
            set 
                 staffname='$name',
                 staffphno='$phno',
                 staffaddress='$address',
                 
                 staffemail='$email',
                 staffusername='$username'
                
                where staffid='$staffid'
            ";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
    echo "<script>alert('Update Completed.');window.location.assign('stafflist.php')</script>";
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
                        <form action="staffupdate.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo $sid?>" type="text" name="txtstaffid" class="form-control"  placeholder="Staff ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $sname?>" name="txtstaffname" class="col-xl-6" id="exampleInputName" placeholder="Enter Staff Name" required>
                            </div>



            

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $sphno?>" name="txtstaffphno" class="form-control" id="exampleInputAddress" placeholder="Enter Ph no" required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $saddress?>" name="txtstaffaddress" class="form-control" id="exampleInputAddress" placeholder="Enter Address " required >
                            </div>

                        
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $semail?>" name="txtstaffemail" class="form-control" id="exampleInputAddress" placeholder="Enter Staff's Email" required >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $susername?>" name="txtstaffusername" class="form-control" id="exampleInputAddress" placeholder="Enter Username" required >
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
  
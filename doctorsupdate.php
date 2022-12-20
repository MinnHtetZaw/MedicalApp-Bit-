

  <?php 
include('header2.php');

 if(isset($_GET['did']))
{
  $did=$_GET['did'];
   $delete="Select * from doctors where doctorid='$did'";
   $ret=mysqli_query($connect,$delete);
   $row=mysqli_fetch_array($ret);

     $did=$row['doctorid'];
     $dname=$row['doctorname'];
     $ddegree=$row['doctordegree'];
     $ddate=$row['doctordate'];
     $dtime=$row['doctortime'];

 }


if (isset($_POST['btnupdate']))
{
    $doctorid=$_POST['txtdoctorid'];
    $doctorname=$_POST['txtdoctorname'];
    $doctordegree=$_POST['txtdoctordegree'];
    $doctordate=$_POST['txtdoctordate'];
    $doctortime=$_POST['txtdoctortime'];
    $department=$_POST['cbodepartment'];

   

    $sql="
            Update doctors
            set doctorname='$doctorname',
                 doctordegree='$doctordegree',
                 doctordate='$doctordate',
                 doctortime='$doctortime',
                 departmentid='$department'
                
                where doctorid='$doctorid'
            ";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
    echo "<script>alert('Update Completed.');window.location.assign('doctors.php')</script>";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Update Doctors' Info</span></h1>
                        
                        <form action="doctorsupdate.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo $did?>" type="text" name="txtdoctorid" class="form-control"  placeholder="Department ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $dname?>" name="txtdoctorname" class="col-xl-6" id="exampleInputName" placeholder="Enter Department Name" required>
                            </div>



                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $ddegree?>" name="txtdoctordegree" class="form-control" id="exampleInputPhno" placeholder="Enter Doctor's Degree" required >
                            </div>
                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $ddate?>" name="txtdoctordate" class="form-control" id="exampleInputAddress" placeholder="Enter Doctor's Date" required >
                            </div>

                             

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $dtime?>" name="txtdoctortime" class="form-control" id="exampleInputUserName" placeholder="Enter Doctor's Time" required="">
                            </div>

                            <tr>
                                  <td>Department</td>
                                  <td><select name="cbodepartment" required>
                              <option>Choose Department</option>
                              <?php 
                                
                                $select="Select * from department";
                                $ret=mysqli_query($connect,$select);
                                $count=mysqli_num_rows($ret);
                                for ($i=0; $i < $count; $i++) 
                                {   
                                  $row=mysqli_fetch_array($ret);
                                  $depname=$row['departmentname'];
                                  $depid=$row['departmentid'];

                                  echo "<option value='$depid'>$depname</option>";
                                }
                               ?>
                               </select></td>
                                  </tr>
                                  <br>
                                  <br>
                                  <br>
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
  
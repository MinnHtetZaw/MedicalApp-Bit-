

  <?php 
include('header2.php');

if(isset($_GET['action']))
{
  $did=$_GET['did'];
  $delete="Delete from doctors where doctorid='$did'";
  $ret=mysqli_query($connect,$delete);
    if($ret)
   {
    echo "<script>alert('Delete Completed.');window.location.assign('doctors.php')</script>";
    }
    else
    {
      echo mysqli_error($connect);
    }
}

if (isset($_POST['btnconfirm']))
{
    $doctorid=$_POST['txtdoctorid'];
    $doctorname=$_POST['txtdoctorname'];
    
    $doctordegree=$_POST['txtdoctordegree'];
    $doctordate=$_POST['txtdoctordate'];

    $doctortime=$_POST['txtdoctortime'];  
    $cbodepartment=$_POST['cbodepartment'];
    

    $insert="INSERT INTO doctors VALUES('$doctorid','$doctorname','$doctordegree','$doctordate','$doctortime','$cbodepartment')";
   $result=mysqli_query($connect,$insert);
   if($result)
   {
    echo "<script>alert('Register Completed.');</script>";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Doctor Register</span></h1>
                        
                        <form action="doctors.php" method="POST">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo AutoID('doctors','doctorid','D_',6); ?>" type="text" name="txtdoctorid" class="form-control"  placeholder="Doctor ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtdoctorname" class="col-xl-6" id="exampleInputName" placeholder="Enter Doctor Name" required>
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtdoctordegree" class="form-control" id="exampleInputPhno" placeholder="Enter Doctor's Degree" required >
                            </div>
                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtdoctordate" class="form-control" id="exampleInputAddress" placeholder="Enter Doctor's Date" required >
                            </div>

                             

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtdoctortime" class="form-control" id="exampleInputUserName" placeholder="Enter Doctor's Time" required="">
                            </div>

                              <tr>
                                  <td>Department</td>
                                  <td><select name="cbodepartment" required="">
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

                            <input type="submit" name="btnconfirm" value="Confirm" class="btn btn-default wow bounceIn" style="float: left;">
                           <input type="reset" name="" value="cancel" class="btn btn-default wow bounceIn" style="float: right;">
                           <br>
                           <br>


        <table width="100%" border>
                        <tr>
                          <td>Doctor ID</td><br>
                          <td>Doctor Name</td>
                          <td>Doctor Degree</td>
                          <td>Doctor Date</td>
                          <td>Doctor Time</td>
                          <td>Department</td>
                          
                          
                        </tr>
                        <?php 
                        $select="Select * from doctors d, department dep where d.departmentid=dep.departmentid";
                        $ret=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($ret);
                        for ($i=0; $i < $count; $i++)
                        { 
                          $row=mysqli_fetch_array($ret);
                          $did=$row['doctorid'];
                          $dname=$row['doctorname'];
                          $ddegree=$row['doctordegree'];
                          $ddate=$row['doctordate'];
                          $dtime=$row['doctortime'];
                          $depname=$row['departmentname'];
                          

                          echo "
                            <tr>
                            <td>$did</td>
                            <td>$dname</td>
                            <td>$ddegree</td>
                            <td>$ddate</td>
                            <td>$dtime</td>
                            <td>$depname</td>
                            
                           
                            <td><a style='width:auto;background-color:white;color:black;' href='doctorsupdate.php?did=$did'>Update</a></td>
                            <td> <a style='width:auto;background-color:white;color:black;' href='doctors.php?action=Delete&did=$did'>Delete</a></td>


                            </td>
                            </tr>
                          ";
                        }
                         ?>
                     </table>





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
  
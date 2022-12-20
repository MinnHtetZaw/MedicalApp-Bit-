

  <?php 
include('header2.php');

 if(isset($_GET['action']))
{
  $depid=$_GET['depid'];
   $delete="Delete from department where departmentid='$depid'";
   $ret=mysqli_query($connect,$delete);
     if($ret)
    {
     echo "<script>alert('Delete Completed.');window.location.assign('department.php')</script>";
     }
     else
     {
       echo mysqli_error($connect);
     }
 }


if (isset($_POST['btnconfirm']))
{
    $departmentid=$_POST['txtdepartmentid'];
    $departmentname=$_POST['txtdepartmentname'];
    
    $departmentimage=$_FILES['txtdepartmentimage']['name'];
    $folder="images/";
    if($departmentimage)
    {
      $filename=$folder."_".$departmentimage;
      $copy=copy($_FILES['txtdepartmentimage']['tmp_name'],$filename);
      if(!$copy)
      {
        exit("Problem Occured in copy image.");
      }
    }
    

    $insert="INSERT INTO department VALUES('$departmentid','$departmentname','$filename')";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Department Register</span></h1>
                        
                        <form action="department.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo AutoID('department','departmentid','Dep_',6); ?>" type="text" name="txtdepartmentid" class="form-control"  placeholder="Department ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtdepartmentname" class="col-xl-6" id="exampleInputName" placeholder="Enter Department Name" required>
                            </div>


                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="file" name="txtdepartmentimage" class="form-control" id="exampleInputImage" placeholder="Enter Department's Image" required>
                            </div>

                              

                            <input type="submit" name="btnconfirm" value="Confirm" class="btn btn-default wow bounceIn" style="float: left;">
                           <input type="reset" name="" value="cancel" class="btn btn-default wow bounceIn" style="float: right;">
                           <br>
                           <br>


                           
                        </form>
                     <!--  -->
                    <table width="100%" border>
                        <tr>
                          <td>Department ID</td>
                          <td>Department Name</td>
                          <td>Department Image</td>
                          
                        </tr>
                        <?php 
                        $select="Select * from department";
                        $ret=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($ret);
                        for ($i=0; $i < $count; $i++)
                        { 
                          $row=mysqli_fetch_array($ret);
                          $depid=$row['departmentid'];
                          $depname=$row['departmentname'];
                         
                          $depimage=$row['departmentimage'];

                          echo "
                            <tr>
                            <td>$depid</td>
                            <td>$depname</td>
                          
                            <td>$depimage</td>
                            
                           <td><a style='width:auto;background-color:white;color:black;' href='departmentupdate.php?depid=$depid'>Update</a></td>
                            <td> <a style='width:auto;background-color:white;color:black;' href='department.php?action=Delete&depid=$depid'>Delete</a></td>

                            </td>
                            </tr>
                          ";
                        }
                         ?>
                     </table>

                     <!--  -->
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- #contact-us close -->

    <?php 
    include('footer.php');
     ?>
  
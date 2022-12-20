

  <?php 
include('header2.php');

 if(isset($_GET['depid']))
{
  $depid=$_GET['depid'];
   $delete="Select * from department where departmentid='$depid'";
   $ret=mysqli_query($connect,$delete);
   $row=mysqli_fetch_array($ret);

     $deid=$row['departmentid'];
     $dename=$row['departmentname'];
 }


if (isset($_POST['btnupdate']))
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

    $sql="
            Update department
            set departmentname='$departmentname',
                 departmentimage='$filename'
                
                where departmentid='$departmentid'
            ";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
    echo "<script>alert('Update Completed.');window.location.assign('department.php')</script>";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Update Departments' Info</span></h1>
                        
                        <form action="departmentupdate.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo $deid?>" type="text" name="txtdepartmentid" class="form-control"  placeholder="Department ID" readonly="" >
                            </div>

                              <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $dename?>"name="txtdepartmentname" class="col-xl-6" id="exampleInputName" placeholder="Enter Department Name" required>
                            </div>


                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="file" name="txtdepartmentimage" class="form-control" id="exampleInputImage" placeholder="Enter Department's Image" required>
                            </div>

                              

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
  
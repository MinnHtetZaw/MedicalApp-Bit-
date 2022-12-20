

  <?php 
include('header2.php');

if(isset($_GET['action']))
{
  $mid=$_GET['mid'];
  $delete="Delete from medicine where medicineid='$mid'";
  $ret=mysqli_query($connect,$delete);
    if($ret)
   {
    echo "<script>alert('Delete Completed.');window.location.assign('medicine.php')</script>";
    }
    else
    {
      echo mysqli_error($connect);
    }
}


if (isset($_POST['btnconfirm']))
{ 
    $mid=$_POST['txtmedicineid'];
    $mname=$_POST['txtmedicinename'];
    $mprice=$_POST['txtprice'];
    $mfdate=$_POST['txtmanufacturedate'];
    $expdate=$_POST['txtexpiredate'];
    

    
    $image=$_FILES['txtmedicineimage']['name'];
    $folder="images/";
 
  
  if ($image) 
  {
    $filename1=$folder."".$image;
    $copy=copy($_FILES['txtmedicineimage']['tmp_name'],$filename1);
  }

    $insert="INSERT INTO medicine VALUES('$mid','$mname','$mprice','$mfdate','$expdate','$filename1')";
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
    <!--
    CONTACT US  start
    ============================= -->
      <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                       <form action="medicine.php" method="POST" enctype="multipart/form-data">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Medicine Register</span></h1>
                        
                     
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo AutoID('medicine','medicineid','M_',6); ?>" type="text" class="form-control" name="txtmedicineid" placeholder="Medicine ID" >
                            </div>
                            
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtmedicinename" class="form-control" placeholder="Enter Medicine Name" required >
                            </div>
                             
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtprice" class="form-control" placeholder="Enter Price" required>
                            </div>
                             <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtmanufacturedate" class="form-control" placeholder="Enter Manufacture Date" required>
                            </div>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" name="txtexpiredate" class="form-control" placeholder="Enter Expired Date" required>
                            </div>


                             <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="file" name="txtmedicineimage" class="form-control" placeholder="Enter Medicine Image" >
                            </div>

                           <input type="submit" name="btnconfirm" value="Confirm">
                       <input type="reset"  value="Cancel">
                        <!--  -->
                     <table width="100%" border>
                        <tr>
                          <td>Medicine ID</td>
                          <td>Medicine Name</td>
                          <td>Price</td>
                          <td>Manufactured Date</td>
                          <td>Expired Date</td>
                          
                          <td>Medicine Image</td>
                          
                          
                        </tr>
                        <?php 
                        $select="Select * from medicine";
                        $ret=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($ret);
                        for ($i=0; $i < $count; $i++)
                        { 
                          $row=mysqli_fetch_array($ret);
                          $mid=$row['medicineid'];
                          $mname=$row['medicinename'];
                          $mprice=$row['price'];
                          $mfdate=$row['manufacturedate'];
                          $expdate=$row['expiredate'];
                        
                          $mimage=$row['medicineimage'];

                          echo "
                            <tr>
                            <td>$mid</td>
                            <td>$mname</td>
                            <td>$mprice</td>
                            <td>$mfdate</td>
                            <td>$expdate</td>
                            <td>$mimage</td>
                           
                            <td><a style='width:auto;background-color:white;color:black;' href='medicineupdate.php?mid=$mid'>Update</a></td>
                            <td> <a style='width:auto;background-color:white;color:black;' href='medicine.php?action=Delete&mid=$mid'>Delete</a></td>


                            </td>
                            </tr>
                          ";
                        }
                         ?>
                     </table>

                     <!--  -->
                     </form>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- #contact-us close -->
    
                        
    <?php 
    include('footer.php');
     ?>
  
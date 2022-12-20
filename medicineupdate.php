

  <?php 
include('header2.php');

 if(isset($_GET['mid']))
{
  $mid=$_GET['mid'];
   $delete="Select * from medicine where medicineid='$mid'";
   $ret=mysqli_query($connect,$delete);
   $row=mysqli_fetch_array($ret);

     $mid=$row['medicineid'];
     $mname=$row['medicinename'];
     $mprice=$row['price'];
     $mdate=$row['manufacturedate'];
     $mexpdate=$row['expiredate'];
     $mimage=$row['medicineimage'];

 }



if (isset($_POST['btnupdate']))
{
    $medicineid=$_POST['txtmedicineid'];
    $medicinename=$_POST['txtmedicinename'];
    $price=$_POST['txtprice'];
    $manufacturedate=$_POST['txtmanufacturedate'];
    $expiredate=$_POST['txtexpiredate'];


    $image=$_FILES['txtmedicineimage']['name'];
    $folder="images/";
 
  
  if ($image) 
  {
    $filename1=$folder."".$image;
    $copy=copy($_FILES['txtmedicineimage']['tmp_name'],$filename1);
  }

   

    $sql="
            Update medicine
            set medicinename='$medicinename',
                 price='$price',
                 manufacturedate='$manufacturedate',
                 expiredate='$expiredate',
                 medicineimage='$filename1'
                
                where medicineid='$medicineid'
            ";
   $result=mysqli_query($connect,$sql);
   if($result)
   {
    echo "<script>alert('Update Completed.');window.location.assign('medicine.php')</script>";
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
                       <form action="medicineupdate.php" method="POST" enctype="multipart/form-data">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Update Medicine's Info</span></h1>
                  
                     
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input value="<?php echo $mid ?>" type="text" class="form-control" name="txtmedicineid" placeholder="Medicine ID" readonly>
                            </div>
                            
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $mname ?>" name="txtmedicinename" class="form-control" placeholder="Enter Medicine Name" required >
                            </div>
                             
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $mprice ?>" name="txtprice" class="form-control" placeholder="Enter Price" required>
                            </div>
                             <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $mdate ?>" name="txtmanufacturedate" class="form-control" placeholder="Enter Manufacture Date" required>
                            </div>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" value="<?php echo $mexpdate ?>" name="txtexpiredate" class="form-control" placeholder="Enter Expired Date" required>
                            </div>


                             <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="file" value="<?php echo $mimage ?>" name="txtmedicineimage" class="form-control" placeholder="Enter Medicine Image" >
                            </div>

                           <input type="submit" name="btnupdate" value="Confirm" class="btn btn-default wow bounceIn" style="float: left;">
                           <input type="reset" name="" value="cancel" class="btn btn-default wow bounceIn" style="float: right;">
                        <!--  -->
                     

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
  
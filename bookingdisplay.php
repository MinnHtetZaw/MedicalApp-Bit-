<?php
session_start();
include('connect.php');
include('header1.php');
//session_start();

 if(isset($_GET['id']))
{
  $did=$_GET['id'];
  $_SESSION['docid']=$did;
   $delete="Select * from doctors where doctorid='$did'";
   $ret=mysqli_query($connect,$delete);
   $row=mysqli_fetch_array($ret);

     $did=$row['doctorid'];
     $dname=$row['doctorname'];
     $ddegree=$row['doctordegree'];
     $ddate=$row['doctordate'];
     $dtime=$row['doctortime'];
     

 }
if(isset($_POST['btnconfirm']))
{
		$bid=$_POST['txtbookingid'];
		$bdate=$_POST['txtbookingdate'];
		$apdate=$_POST['txtappointmentdate'];
		$pid=$_SESSION['Patientid'];
		$status='Pending';
        $docid=$_SESSION['docid'];
		

	$insert="INSERT INTO booking VALUES('$bid','$bdate','$apdate','$pid','$status','$docid')";
   $result=mysqli_query($connect,$insert);

   $insert_bl="INSERT INTO bookinglist VALUES('$bid','$docid')";
   $result=mysqli_query($connect,$insert_bl);

   if($result)
   {
    echo "<script>alert('Booking Completed.');window.location.assign('display.php')</script>";
    }
    else
    {
      echo "Incomplete.";
    }

  		
}
?>



<section class="item-category-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-80 header-text text-center">
							<h1 class="pb-10">Appoinment</h1>
							
							<form action="bookingdisplay.php" method='POST'>

								<center>
									<td> Booking ID:</td>	<input  style="width:500px;display:block" name="txtbookingid" value="<?php echo AutoID('booking','bookingid','B_',6) ?>" readonly><br>

								<td> Booking Date:</td> <input  style="width:500px;display:block" name="txtbookingdate" value="<?php echo date('d/m/y') ?>" readonly><br>

								<td>Doctor Name:</td> <input  style="width:500px;display:block" name="txtname" value="<?php echo $dname ?>" readonly><br>

								<td>Doctor Degree:</td> <input  style="width:500px;display:block;display:block;display:block" value="<?php echo $ddegree ?>" readonly><br>

								<td>Doctor Date:</td> <input  style="width:500px;display:block;display:block" value="<?php echo $ddate ?>" readonly><br>

								<td>Doctor Date:</td> <input  style="width:500px;display:block" value="<?php echo $dtime ?>" readonly><br>

								<td>Appointment Date:</td> <input style="width:500px;display:block" name="txtappointmentdate" id="datepicker">

								<input type="submit" name="btnconfirm" value="Confirm" class="btn btn-default wow bounceIn" style="float: left;">
                           <input type="reset" name="" value="cancel" class="btn btn-default wow bounceIn" style="float: right;">
								
</form>		
</center>

</section>				
					
								
                         

						</div>

					</div>

					
				</div>	
			
		<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>				
			
<?php
include('footer.php');
?>

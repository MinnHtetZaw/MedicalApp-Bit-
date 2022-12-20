<?php 
	include('header2.php');


 ?>

 <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                    	<br>
                    	<br>
                        <h1 class="heading wow fadeInUp" align="center" data-wow-duration="500ms" data-wow-delay="300ms"><span>Appointment Approve</span></h1>
                        <br>
                        <form action="bookingapprove.php" method="post">
                            
                        Booking ID:
                        <div>
                            <input type="text" name="txtsearch" placeholder="Enter BookingID" required="">    
                        </div><br>
                        <div>
                            <input type="submit" name="btnsearch" value="Search"> 
                            
                            </div>

                        <br>

                    
                        Search Result:<br><br>
                        <table id="tableid" class="display" style="width:1100px; text-align:center;">
                            <tr>
                            <td>Booking ID</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Booking Date</td>
                            <td>Appointment Date</td>
                            <td>Doctor Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                       <?php 
                       if(isset($_POST['btnsearch']))
                        {

                                $search=$_POST['txtsearch'];
                                $Squery="SELECT * from booking b, patient p, doctors d where b.bookingid='$search'and b.patientid=p.patientid and d.doctorid=b.doctorid"; 
                                $ret=mysqli_query($connect,$Squery);
                                $count=mysqli_num_rows($ret);
                            for ($i=0; $i < $count; $i++)
                            { 
                                    $row=mysqli_fetch_array($ret);
                                    $bid=$row['bookingid'];
                                    $pid=$row['patientid'];
                                    $pname=$row['patientname'];
                                    $bdate=$row['bookingdate'];
                                    $apdate=$row['appointmentdate'];
                                    $dname=$row['doctorname'];
                                    $Status=$row['bookingstatus'];

                                    echo "
                            <tr>
                            <td>$bid</td>
                            <td>$pid</td>
                            <td>$pname</td>
                            <td>$bdate</td>
                            <td>$apdate</td>
                            <td>$dname</td>
                            <td>$Status</td>
                            <td><a href='Bookaccept.php?searchid=$search'>Accept</a></td>

                            </tr>
                          ";

                            }
                            

  
                        }

                        ?>
                         </table>
                         </form>

                      </div>

                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section>

    <?php 
    include('footer.php');
     ?>
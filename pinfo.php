<?php 
session_start();
include('header1.php');

 ?>

<section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Personal Information</span></h1>
                        <form action="pinfo.php" method="POST">
                        <table width="100%" border>
                        <tr>
                          <td>Patient ID</td><br>
                          <td>Name</td>
                          <td>Age</td>
                          <td>Gender</td>
                          <td>Ph no</td>
                          <td>Address</td>
                          <td>NRC</td>
                          <td>Email</td>
                          <td>Username</td>
                          
                          
                        </tr>
                        <?php 
                        $patientid=$_SESSION['Patientid'];
                        $select="Select * from patient where patientid='$patientid' ";
                        $ret=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($ret);
                        for ($i=0; $i < $count; $i++)
                        { 
                          $row=mysqli_fetch_array($ret);
                          $pid=$row['patientid'];
                          $pname=$row['patientname'];
                          $page=$row['patientage'];
                          $pgender=$row['patientgender'];
                          $pphno=$row['patientphno'];
                          $paddress=$row['patientaddress'];
                          $pnrc=$row['patientNRC'];
                          $pemail=$row['patientemail'];
                          $pusername=$row['patientusername'];   
                          

                          echo "
                            <tr>
                            <td>$pid</td>
                            <td>$pname</td>
                            <td>$page</td>
                            <td>$pgender</td>
                            <td>$pphno</td>
                            <td>$paddress</td>
                            <td>$pnrc</td>
                            <td>$pemail</td>
                            <td>$pusername</td>
                            
                           
                            <td><a style='width:auto;background-color:white;color:black;' href='pinfoupdate.php?pid=$pid'>Update</a></td>
                           


                            </td>
                            </tr>
                          ";
                        }
                         ?>



                        
                        <table width="100%" border>
                          <br><br>
                          <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Appointment Information</span></h1>
                        <tr>
                          <td>Booking ID</td><br>
                          <td>Booking Date</td>
                          <td>Appointment Date</td>
                          <td>Doctor Name</td>
                          <td>Status</td>


                           <?php 
                        $patientid=$_SESSION['Patientid'];
                        $select1="Select * from doctors d, patient p, booking b where p.patientid='$patientid' and p.patientid=b.patientid and b.doctorid=d.doctorid ";
                        $ret1=mysqli_query($connect,$select1);
                        $count1=mysqli_num_rows($ret1);
                        for ($i=0; $i < $count1; $i++)
                        { 
                          $row=mysqli_fetch_array($ret1);
                          $bid=$row['bookingid'];
                          $bdate=$row['bookingdate'];
                          $apdate=$row['appointmentdate'];
                          $dname=$row['doctorname'];
                          $status=$row['bookingstatus'];
                          

                          echo "
                            <tr>
                            <td>$bid</td>
                            <td>$bdate</td>
                            <td>$apdate</td>
                            <td>$dname</td>
                            <td>$status</td>
                           


                            </td>
                            </tr>
                          ";
                        }
                         ?>



                         <table width="100%" border>
                          <br><br>
                          <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Medicine Sale History</span></h1>
                        <tr>
                          <td>Medicine sale ID</td><br>
                          <td>Sale Date</td>
                          <td>Total Cost</td>
                          <td>Total Quantity</td>
                          <td>Payment Date</td>
                          <td>Status</td>


                           <?php 
                        $patientid=$_SESSION['Patientid'];
                        $select2="Select * from medicinesale ms, patient p, payment pm where p.patientid='$patientid' and p.patientid=ms.patientid and ms.paymentid=pm.paymentid ";
                        $ret2=mysqli_query($connect,$select2);
                        $count2=mysqli_num_rows($ret2);
                        for ($i=0; $i < $count2; $i++)
                        { 
                          $row=mysqli_fetch_array($ret2);
                          $msid=$row['medicinesaleid'];
                          $sdate=$row['saledate'];
                          $tcost=$row['totalcost'];
                          $tq=$row['totalquantity'];
                          $pdate=$row['paymentdate'];
                          $status=$row['status'];
                          

                          echo "
                            <tr>
                            <td>$msid</td>
                            <td>$sdate</td>
                            <td>$tcost</td>
                            <td>$tq</td>
                            <td>$pdate</td>
                            <td>$status</td>
                        
                            </td>
                            </tr>
                          ";
                        }
                         ?>


                        
                     </table>
                     </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section>
<?php 
  include('footer.php');
 ?>

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
                        <h1 class="heading wow fadeInUp" align="center" data-wow-duration="500ms" data-wow-delay="300ms"><span>Medicine Sale Approve</span></h1>
                        <br>
                        <form action="medicineapprove.php" method="post">
                            
                        Sale ID:
                        <div>
                            <input type="text" name="txtsearch" placeholder="Enter Sale ID" required="">    
                        </div><br>
                        <div>
                            <input type="submit" name="btnsearch" value="Search"> 
                            
                            </div>

                        <br>

                    
                        Search Result:<br><br>
                        <table id="tableid" border class="display" style="width:1200px; text-align:center;">
                            <tr>
                            <td>Sale ID</td>
                            <td>Patient ID</td>
                            <td>Patient Name</td>
                            <td>Patient Phone</td>
                            <td>Sale Date</td>
                            <td>Payment Date</td>
                            <td>Total Quantity</td>
                            <td>Total Cost</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                       <?php 
                       if(isset($_POST['btnsearch']))
                        {

                                $search=$_POST['txtsearch'];
                                $Squery="SELECT * from medicinesale ms, patient p, payment pm where ms.medicinesaleid='$search'and ms.patientid=p.patientid and ms.paymentid=pm.paymentid"; 
                                $ret=mysqli_query($connect,$Squery);
                                $count=mysqli_num_rows($ret);
                            for ($i=0; $i < $count; $i++)
                            { 
                                    $row=mysqli_fetch_array($ret);
                                    $msid=$row['medicinesaleid'];
                                    $pid=$row['patientid'];
                                    $pname=$row['patientname'];
                                    $phone=$row['patientphno'];
                                    $sdate=$row['saledate'];
                                    $pdate=$row['paymentdate'];
                                    $cost=$row['totalcost'];
                                    $q=$row['totalquantity'];
                                    $status=$row['status'];

                                    echo "
                            <tr>
                            <td>$msid</td>
                            <td>$pid</td>
                            <td>$pname</td>
                            <td>$phone</td>
                            <td>$sdate</td>
                            <td>$pdate</td>
                            <td>$q</td>
                            <td>$cost</td>
                            <td>$status</td>
                            <td><a href='saleaccept.php?searchid=$search'>Accept</a></td>

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
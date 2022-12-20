<?php 
include('header2.php');


if(isset($_GET['action']))
{
  $did=$_GET['did'];
  $delete="Delete from patient where patientid='$pid'";
  $ret=mysqli_query($connect,$delete);
    if($ret)
   {
    echo "<script>alert('Delete Completed.');window.location.assign('patientlist.php')</script>";
    }
    else
    {
      echo mysqli_error($connect);
    }
}
 ?>

<section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Patient List</span></h1>
                        <form action="patientlist.php" method="POST">
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
                        $select="Select * from patient";
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
                            
                           
                            <td><a style='width:auto;background-color:white;color:black;' href='Adpatientupdate.php?pid=$pid'>Update</a></td>
                            <td> <a style='width:auto;background-color:white;color:black;' href='patientlist.php?action=Delete&pid=$pid'>Delete</a></td>


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

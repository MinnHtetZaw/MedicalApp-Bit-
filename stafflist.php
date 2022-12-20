<?php 
include('header2.php');


if(isset($_GET['action']))
{
  $sid=$_GET['sid'];
  $delete="Delete from staff where staffid='$sid'";
  $ret=mysqli_query($connect,$delete);
    if($ret)
   {
    echo "<script>alert('Delete Completed.');window.location.assign('stafflist.php')</script>";
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
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms"><span>Staff List</span></h1>
                        <form action="stafflist.php" method="POST">
                        <table width="100%" border>
                        <tr>
                          <td>Staff ID</td><br>
                          <td>Name</td>
                         
                          <td>Ph no</td>
                          <td>Address</td>
                          
                          <td>Email</td>
                          <td>Username</td>
                          
                          
                        </tr>
                        <?php 
                        $select="Select * from staff";
                        $ret=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($ret);
                        for ($i=0; $i < $count; $i++)
                        { 
                          $row=mysqli_fetch_array($ret);
                          $sid=$row['staffid'];
                          $sname=$row['staffname'];
                          
                          
                          $sphno=$row['staffphno'];
                          $saddress=$row['staffaddress'];
                          
                          $semail=$row['staffemail'];
                          $susername=$row['staffusername'];   
                          

                          echo "
                            <tr>
                            <td>$sid</td>
                            <td>$sname</td>
                            
                            <td>$sphno</td>
                            <td>$saddress</td>
                           
                            <td>$semail</td>
                            <td>$susername</td>
                            
                           
                            <td><a style='width:auto;background-color:white;color:black;' href='staffupdate.php?sid=$sid'>Update</a></td>
                            <td> <a style='width:auto;background-color:white;color:black;' href='stafflist.php?action=Delete&sid=$sid'>Delete</a></td>


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

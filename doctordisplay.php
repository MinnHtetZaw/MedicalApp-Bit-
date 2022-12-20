<?php
session_start();
include('connect.php');
include('header1.php');
//session_start();
?>
<html>
<head>
	<title></title>
</head>
<body>


	



<section class="item-category-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-80 header-text text-center">
							<h1 class="pb-10"></h1>
							
							<form action="doctordisplay.php" method='POST'>


</form>

						</div>

					</div>

					<div class="row">


<?php
		if(isset($_GET['id'])) 
	{
		$id=$_GET['id'];
		
		 
			 $select="
			 Select *
				From doctors d, department de where de.departmentid='$id' and de.departmentid=d.departmentid";
			$ret=mysqli_query($connect,$select);
			$count1=mysqli_num_rows($ret);
			
			for ($a=0; $a < $count1 ; $a++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$id=$row['doctorid'];
				$name=$row['doctorname'];
				$degree=$row['doctordegree'];
				$date=$row['doctordate'];
				$time=$row['doctortime'];
				

				echo "<div class='col-lg-3 col-md-6'>
							<div class='single-cat-item'>
								<div class='thumb'>
				</div>	
				<h4>$name</h4>
				<h4>$degree</h4>
				<h4>$date</h4>
				<h4>$time</h4>

								
							</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a class='popup-with-form' style='width:auto;background-color:white;color:black;'href='bookingdisplay.php?id=$id'>Book</a>


				
				</div>

					
				";
			}
			
		}
		


?>


					</div>
				</div>	
			</section>				
						
						
			
<?php
include('footer.php');
?>
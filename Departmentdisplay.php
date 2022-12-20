<?php
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
							
							<form action="Departmentdisplay.php" method='POST'>


</form>

						</div>

					</div>

					<div class="row">


<?php
	
		
		 
			 $select="
			 Select *
				From department";
			$ret=mysqli_query($connect,$select);
			$count1=mysqli_num_rows($ret);
			
			for ($a=0; $a < $count1 ; $a++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$id=$row['departmentid'];
				$img1=$row['departmentimage'];
				$name=$row['departmentname'];

				echo "<div class='col-lg-3 col-md-6'>
							<div class='single-cat-item'>
								<div class='thumb'>
				<img src='$img1' width='180px' height='150px'>
				</div>	
				<h4>$name</h4>
								
							</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='doctordisplay.php?id=$id'>Detail</a>
				</div>

					
				";
			}
			
		
		


?>
					</div>
				</div>	
			</section>				
						
						
			
<?php
include('footer.php');
?>
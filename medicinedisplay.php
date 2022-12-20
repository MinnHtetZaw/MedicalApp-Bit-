<?php 
	include('header1.php');
 ?>
<section class="item-category-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-80 header-text text-center">
							<h1 class="pb-10"></h1>
							
							<form action="medicinedisplay.php" method='POST'>

<br><br>
</form>

						</div>

					</div>

					<div class="row">


<?php
		
		  
			 $select="
			 Select *
				From medicine";
			$ret=mysqli_query($connect,$select);
			$count1=mysqli_num_rows($ret);
			
			for ($a=0; $a < $count1 ; $a++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$id=$row['medicineid'];
				$img1=$row['medicineimage'];
				$name=$row['medicinename'];

				echo "<div class='col-lg-3 col-md-6'>
							<div class='single-cat-item'>
								<div class='thumb'>
				<img src='$img1' width='180px' height='150px'>
				</div>	
				<h4>$name</h4>
								
							</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a  href='medicinedetail.php?id=$id'>Detail</a>
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
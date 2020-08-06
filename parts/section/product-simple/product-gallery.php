<?php

	include "includes/config.php";
	
	$sql = "SELECT * FROM products";

	$result = mysqli_query($con, $sql) or die ("Query Faild.");

	if(mysqli_num_rows($result) > 0){
		
		while($row = mysqli_fetch_assoc($result)){

?>
<section class="slider">
	<div class="row">
		<div class="col-md-10">
			<div id="slider" class="flexslider">
				<ul class="slides">
					<li>
						<a href="admin/assets/img/products/<?php echo $row['product_image1']; ?>" data-title="Gallery" data-lightbox="image-1">
						     <img src="admin/assets/img/products/<?php echo $row['product_image1']; ?>" data-title="Gallery" data-lightbox="image-1" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt="" />
						
						<div class="zoom-overlay"></div>
						</a>
						
					</li>
					<li>
						<a href="admin/assets/img/products/<?php echo $row['product_image2']; ?>" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="admin/assets/img/products/<?php echo $row['product_image2']; ?>" alt="" />
						<div class="zoom-overlay"></div>
					</a>
						
					</li>
					<li>
						<a href="admin/assets/img/products/<?php echo $row['product_image3']; ?>" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="admin/assets/img/products/<?php echo $row['product_image3']; ?>" alt="" />
						<div class="zoom-overlay"></div>
					</a>
					
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-2">
			<div id="carousel" class="flexslider">
				<ul class="slides">
					<li>
						<img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt=""  />
					</li>
					<li>
						<img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt=""   />
					</li>
					<li>
						<img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt=""   />
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
	<?php 
		} 
	}
	?>
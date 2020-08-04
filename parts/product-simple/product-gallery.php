<?php

	include "includes/config.php";

	$pro_id = $_GET['pid'];
	
	$sql = "SELECT product_image1, product_image2, product_image3, FROM products where product_id = '{$pro_id}'";

	$result = mysqli_query($con, $sql) or die ("Query Faild.");

	if(mysqli_num_rows($result) > 0){
		
		while($row = mysqli_fetch_assoc($result)){

?>
<section class="slider wow fadeIn">
	<div class="row">
		<div class="col-md-10 col-xs-10">
			<ul id="product-images">
				<li>
					<a href="assets/images/products/big-image.jpg" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="assets/images/products/big-image.jpg" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
				<li>
					<a href="assets/images/products/big-image.jpg" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="assets/images/products/big-image.jpg" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
				<li>
					<a href="assets/images/products/big-image.jpg" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="assets/images/products/big-image.jpg" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
				<li>
					<a href="assets/images/products/big-image.jpg" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="assets/images/products/big-image.jpg" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
				<li>
					<a href="assets/images/products/big-image.jpg" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="assets/images/products/big-image.jpg" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
			</ul>
		</div>
        <div class="col-md-2 col-xs-2">
			<ul id="product-thumbnails" class="vertical">
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s1.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s2.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s3.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s2.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s1.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s1.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s2.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s3.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s2.jpg" class="lazy-load" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="assets/images/products/s1.jpg" class="lazy-load" alt="" /></li>
			</ul>
		</div>
	</div>
</section>
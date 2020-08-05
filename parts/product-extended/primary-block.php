<div id="single-product" class="inner-top-50 wow fadeIn">
	<div class="container">
		<div class="row single-product-row">
			<?php

				include "includes/config.php";

				$pro_id = $_GET['pid'];

				$sql = "SELECT * FROM products where product_id = '{$pro_id}'";

				$result = mysqli_query($con, $sql) or die ("Query Faild.");

				if(mysqli_num_rows($result) > 0){
					
					while($row = mysqli_fetch_assoc($result)){

			?>
			<div class="col-sm-6 col-lg-6 gallery-holder">
				<div class="product-image-slider">
					<?php require_once ROOT.'/parts/product-extended/product-gallery.php'; ?>
				</div>
			</div>
            <div class="col-sm-6 col-lg-5 body-holder body-holder-style-2">
				<div class="product-info">
					<div class="product-rating-holder">
						<a href="#" class="product-rating">
							<div class="star-rating gray" title="Rated 5.00 out of 5">
								<span style="width:80%">
									<strong class="rating">5.00</strong>
									out of 5
								</span>
							</div>
						</a>
						<a href="#reviews" class="review-link">(4 reviews)</a>
					</div>

					<h1 class="single-product-title"><?php echo $row['product_name']; ?></h1>
					<div class="product-brand"><?php echo $row['product_company']; ?></div>
					<div class="excerpt inner-vs">
						<p><?php echo $row['product_description']; ?></p>
					</div>
					<div class="product-attributes">
						<div class="color-holder clearfix">
							<span class="key">Color: </span><span class="value">Black  Native</span>
							<ul class="color-picker clearfix">
								<li><input class="le-radio blue checked" type="radio" value="color1" name="group" checked="checked"></li>
								<li><input class="le-radio gray" type="radio" value="color2" name="group"></li>
								<li><input class="le-radio red" type="radio" value="color3" name="group"></li>
								<li><input class="le-radio green" type="radio" value="color4" name="group"></li>
								<li><input class="le-radio" type="radio" value="color5" name="group"></li>
							</ul>
						</div>

						<div class="size-holder m-t-20 clearfix">
							<span class="key">Size:</span>
							<ul class="size-picker clearfix">
								<li><input id="group1" class="attribute-radio" type="radio" value="color1" name="group">
									<label for="group1"><span>7</span></label>		
								</li>
								<li><input id="group2" class="attribute-radio" type="radio" value="color2" name="group">
									<label for="group2"><span>8</span></label>																	
								</li>
								<li><input id="group3" class="attribute-radio" type="radio" value="color3" name="group">
									<label for="group3"><span>8.5</span></label>					
								</li>
								<li><input id="group4" class="attribute-radio" type="radio" value="color4" name="group">
									<label for="group4"><span>9</span></label>			
								</li>
								<li><input id="group5" class="attribute-radio" type="radio" value="color5" name="group">
									<label for="group5"><span>9.5</span></label>						
								</li>
								<li><input id="group6" class="attribute-radio" type="radio" value="color6" name="group">
									<label for="group6"><span>10</span></label>						
								</li>
								<li><input id="group7" class="attribute-radio" type="radio" value="color7" name="group">
									<label for="group7"><span>11</span></label>						
								</li>
								<li><input id="group8" class="attribute-radio" type="radio" value="color8" name="group">
									<label for="group8"><span>12.5</span></label>						
								</li>
								<li><input id="group9" class="attribute-radio" type="radio" value="color9" name="group">
									<label for="group9"><span>13</span></label>						
								</li>
								<li><input id="group10" class="attribute-radio" type="radio" value="color10" name="group">
									<label for="group10"><span>13.5</span></label>						
								</li>
							</ul>
						</div>
					</div>

					<div class="qnt-holder">
						<form class="cart">
							<div class="quantity-holder">
								<span class="key">Qty:</span>
								<input type="number" class="txt txt-qty" title="Qty" value="1" name="quantity" min="1" step="1">
							</div>

							<a href="#" title="Wishlist" class="btn add-to-wishlist">add to wishlist</a>
						</form>
					</div>

					<div class="add-to-bag-holder">
						<a href="#" class="add-bag-button btn btn-block">add to bag</a>
						<p class="single-product-price text-center">Rs. <?php echo $row['product_price']; ?></p>
					</div>

					<a href="#" class="sharing-with-friends text-center">share it with your friends</a>

				</div>
			</div>
            <div class="col-md-1 col-lg-1 hidden-xs hidden-sm hidden-md related-products-holder">
				<h5 class="related-title">Related</h5>
				<ul class="related-products">
					<li><a href="#"><img src="assets/images/blank.gif" data-echo="assets/images/products/relate.jpg" alt="" ></a></li>
					<li><a href="#"><img src="assets/images/blank.gif" data-echo="assets/images/products/relate1.jpg" alt="" ></a></li>
					<li><a href="#"><img src="assets/images/blank.gif" data-echo="assets/images/products/relate2.jpg" alt="" ></a></li>
				</ul>
			</div>
			<?php
					}
				}
			?>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg quick-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">     
			<div class="modal-body">
				<div class="row single-product-row">
					<div class="col-sm-6 col-lg-6 col-xs-12 gallery-holder">
						<?php

							include "includes/config.php";

							$pro_id = $_GET['pid'];
							
							$sql = "SELECT * FROM products where product_id = '{$pro_id}'";

							$result = mysqli_query($con, $sql) or die ("Query Faild.");

							if(mysqli_num_rows($result) > 0){
								
								while($row = mysqli_fetch_assoc($result)){

						?>
						<div class="product-image-slider">
							<div class="quick-view-slider">
								<div class="item">
									<img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt="" />
								</div>
								<div class="item">
									<img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image2']; ?>" alt="" />
								</div>
								<div class="item">
									<img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image3']; ?>" alt="" />
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-6 col-xs-12 body-holder">
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
							<div class="product-price">
								<ins><span class="amount">Rs. <?php echo $row['product_price']; ?></span></ins>
							</div>

							<div class="product-attributes">
								<div class="color-holder clearfix">
									<span class="key">Color:</span> <span class="value">Black  Native</span>
									<ul class="color-picker clearfix">
										<li><input class="le-radio blue checked" type="radio" value="color1" name="main" checked="checked">		
										</li>
										<li><input class="le-radio gray" type="radio" value="color2" name="main">																	
										</li>
										<li><input class="le-radio red" type="radio" value="color3" name="main">				
										</li>
										<li><input class="le-radio green" type="radio" value="color4" name="main">		
										</li>
										<li><input class="le-radio" type="radio" value="color5" name="main">					
										</li>
									</ul>
								</div>

								<div class="size-holder m-t-20 clearfix">
									<span class="key">size:</span>
									<ul class="size-picker clearfix">
										<li><input id="group1-1" class="attribute-radio" type="radio" value="color1" name="group">
											<label for="group1-1"><span>7</span></label>		
										</li>
										<li><input id="group2-1" class="attribute-radio" type="radio" value="color2" name="group">
											<label for="group2-1"><span>8</span></label>																	
										</li>
										<li><input id="group3-1" class="attribute-radio" type="radio" value="color3" name="group">
											<label for="group3-1"><span>8.5</span></label>					
										</li>
										<li><input id="group4-1" class="attribute-radio" type="radio" value="color4" name="group">
											<label for="group4-1"><span>9</span></label>			
										</li>
										<li><input id="group5-1" class="attribute-radio" type="radio" value="color5" name="group">
											<label for="group5-1"><span>9.5</span></label>						
										</li>
										<li><input id="group6-1" class="attribute-radio" type="radio" value="color6" name="group">
											<label for="group6-1"><span>10</span></label>						
										</li>
										<li><input id="group7-1" class="attribute-radio" type="radio" value="color7" name="group">
											<label for="group7-1"><span>11</span></label>						
										</li>
										<li><input id="group8-1" class="attribute-radio" type="radio" value="color8" name="group">
											<label for="group8-1"><span>12.5</span></label>						
										</li>
										<li><input id="group9-1" class="attribute-radio" type="radio" value="color9" name="group">
											<label for="group9-1"><span>13</span></label>						
										</li>
										<li><input id="group10-1" class="attribute-radio" type="radio" value="color10" name="group">
											<label for="group10-1"><span>13.5</span></label>						
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

									<button type="submit" class="btn btn-primary single-add-cart-button">Add to bag</button>

									<a href="#" title="Wishlist" class="btn add-to-wishlist"></a>

								</form>
							</div>

							<div id="product-simple-tab1" class="hidden-sm">
								<div class="tabs">
									<ul class="nav nav-tabs nav-tab-cells">
										<li class="active"><a data-toggle="tab" href="#modal-description">Description</a></li>
										<li><a data-toggle="tab" href="#modal-info">Sizing</a></li>
										<li><a data-toggle="tab" href="#modal-reviews">Reviews (4)</a></li>
									</ul>

									<div class="tab-content bewear-tab-content">
										<div id="modal-description" class="tab-pane fade in active">
											<p class="text">
											<?php echo $row['product_decription']; ?></p>
												<ul>
													<li>- 98% Cotton, 2% Elastane</li>
													<li>- Zip fly and button fastening</li>

												</ul>
											</div>
											<div id="modal-info" class="tab-pane fade">
												<ul class="tabled-data">
													<li>
														<label>weight</label>
														<div class="value">7.25 kg</div>
													</li>
													<li>
														<label>dimensions</label>
														<div class="value">90x60x90 cm</div>
													</li>
													<li>
														<label>size</label>
														<div class="value">one size fits all</div>
													</li>
													<li>
														<label>color</label>
														<div class="value">white</div>
													</li>
													<li>
														<label>guarantee</label>
														<div class="value">5 years</div>
													</li>
												</ul>
											</div>
											<div id="modal-reviews" class="tab-pane fade">
												<article class="review">
													<div class="header">
														<div class="star-rating gray" title="Rated 5.00 out of 5">
															<span style="width:80%">
																<strong class="rating">5.00</strong>
																out of 5
															</span>
														</div>
														<h4 class="author">Richard Doe</h4>
														<span class="date">Aug 7, 2013</span>
													</div>
													<p class="text">
														Choupette Mulberry dark red lipstick crop button up chunky sole chambray shirt
														maxi skirt vintage Levi shorts. Loafers 90s collar indigo denim silver collar
														round sunglasses.
													</p>
												</article>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a class="remove-icon" data-dismiss="modal" aria-label="Close"><span class="icon icon-quickview-close"></span></a>
				</div>
				<?php
						}
					}
				?>
			</div>
		</div>
	</div>
	
<section class="slider wow fadeIn">
	<div class="row">
		<div class="col-md-10 col-xs-10">
			<ul id="product-images">
				<li>
					<a href="admin/assets/img/products/<?php echo $row['product_image1']; ?>" data-title="Gallery" data-lightbox="image-1">
					     <img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
				<li>
					<a href="admin/assets/img/products/<?php echo $row['product_image2']; ?>" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="admin/assets/img/products/<?php echo $row['product_image2']; ?>" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
				<li>
					<a href="admin/assets/img/products/<?php echo $row['product_image3']; ?>" data-title="Gallery" data-lightbox="image-1">
						<img src="assets/images/blank.gif" data-title="Gallery" data-lightbox="image-1" data-echo="admin/assets/img/products/<?php echo $row['product_image3']; ?>" alt="" />
						<span class="zoom-overlay"></span>
					</a>
				</li>
			</ul>
		</div>
        <div class="col-md-2 col-xs-2">
			<ul id="product-thumbnails" class="vertical">
				<li><img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image2']; ?>" alt="" /></li>
				<li><img src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $row['product_image3']; ?>" alt="" /></li>
			</ul>
		</div>
	</div>
</section>
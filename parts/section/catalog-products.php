<?php

	include "includes/config.php";

		$limit = 6;

							
		if(isset($_GET['pageid'])){
			$page = $_GET['pageid'];
		}else{
			$page = 1;
		}
		$offset = ($page - 1) * $limit;
	
		$sql = "SELECT * FROM products
		ORDER BY product_id DESC LIMIT {$offset}, {$limit}";

		$result = mysqli_query($con, $sql) or die ("Query Faild.");

		if(mysqli_num_rows($result) > 0){

			while($row = mysqli_fetch_assoc($result)){

?>
<div class='col-md-6 col-sm-6 col-lg-4 col-xs-12 product-holder'>
	
	<div class="product">
	
		<div class="ribbon blue">
			<span>new!</span>
		</div>
		<div class="ribbon green">
			<span>bestseller</span>
		</div>
		<div class="image">
			<a href="index.php?page=product-simple&pid=<?php echo $row["product_id"] ?>"><img class="img-responsive" width="258" src="admin/assets/img/products/<?php echo $row['product_image1']; ?>" alt=""></a>
		</div><!-- .image -->
		<div class="product-info m-t-20 text-center">
			<a class="quick-view uppercase" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon icon-more-colors-product"></i> Quick view</a>
			<ul class="color-picker clearfix">
				<li class="selected"><input class="le-radio group black" type="radio" value="g1" checked="checked" name="c4" >																
				</li>
				<li><input class="le-radio gray" type="radio" value="g1-2" name="c4">
				</li>			
			</ul><!-- .color-picker -->
			<h5 class="name uppercase"><a href="index.php?page=product-simple&pid=<?php echo $row["product_id"] ?>"><?php echo $row['product_name']; ?></a></h5>
			<div class="product-price">
				<ins><span class="amount">Rs. <?php echo $row['product_price']; ?></span></ins>
			</div><!-- .product-price -->
			<div class="buttons-holder m-t-20">					
				<div class="add-cart-holder">
				<?php if($row['product_availability'] == 'In Stock'){?>
					<a title="Add to cart" href="ndex.php?page=shop&action=add&id=<?php echo $row['product_id']; ?>" class="cart-button btn btn-primary">
						<span>Add to bag</span>
					</a>
					<?php }else{?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>

				</div><!-- .add-cart-holder -->

				<div class="add-wishlist-holder">

					<a href="index.php?page=checkout" title="Wishlist" class="wishlist-button uppercase">
						<span class="icon icon-wishlist"></span> add to wishlist
					</a>
				</div><!-- .add-wishlist-holder -->
			</div><!-- .buttons-holder -->
		</div><!-- .product-info -->
	</div>
</div>
<?php
		}
	}

?>
<?php 

 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
<div id="shopping-cart-summary" class="navmenu-shopping-cart navmenu navmenu-default navmenu-fixed-right offcanvas">
	<header>
		<h3 class="section-title">Items <span class="item-count">4</span></h3>
		<ul class="currency-block animate-dropdown">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><strong>$</strong> US Dollars</a>

                <ul role="menu" class="dropdown-menu">
                    <li role="presentation"><a href="#" tabindex="-1" role="menuitem">EU Euro</a></li>
                    <li role="presentation"><a href="#" tabindex="-1" role="menuitem">TL Turkish Lira</a></li>
                    <li role="presentation"><a href="#" tabindex="-1" role="menuitem">INR Indian Rupee</a></li>
                    <li role="presentation"><a href="#" tabindex="-1" role="menuitem">US Dollars</a></li>

                </ul>
            </li>
        </ul>
	</header>
	<?php
		if(!empty($_SESSION['cart'])){
	?>
	<div class="cart-products">
	<?php
    	$sql = "SELECT * FROM products WHERE product_id IN(";
		foreach($_SESSION['cart'] as $id => $value){
		$sql .=$id. ",";
		}
		$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
		$query = mysqli_query($con,$sql);
		$totalprice=0;
		$totalqunty=0;
		if(!empty($query)){
		while($row = mysqli_fetch_array($query)){
			$quantity=$_SESSION['cart'][$row['id']]['quantity'];
			$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
			$totalprice += $subtotal;
			$_SESSION['qnty']=$totalqunty+=$quantity;

	?>
		<div class="cart-block-list">
			<ul>
				<li>
					<div class="product">
						<div class='row'>
							<div class="col-md-4 col-sm-4">
								<a href="index.php?page=product-simple&pid=<?php echo $row['product_id'];?>"><img src="assets/images/blank.gif" data-echo="admin/assets/producs/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt=""></a>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="cart-info">
									<div class="product-name">
										<span class="quantity-formated"><span class="quantity">1</span>x</span>
										<a href="index.php?page=product-simple&pid=<?php echo $row['product_id'];?>"><?php echo $row['product_name']; ?></a>
									</div>

									<div class="product-price">
										<span class='amount'>Rs.<?php echo ($row['product_price']+$row['shipping_charge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></span>
									</div>
								</div>
							</div>
						</div>
						<a href="#" class="remove-link"></a>
					</div>
				</li>

				
			</ul>

			<div class="cart-summary text-center inner-top-50">
                <h5 class="cart-total">Your Total</h5>
                <p class="cart-total-price">$492.00</p>
                <p class="instruction">shipping costs are calculated at the next step,before you pay.</p>
                <a class="btn btn-primary btn-uppercase continue-shopping" href="index.php?page=checkout">continue to checkout</a>
            </div>
		</div>
	</div>
</div>
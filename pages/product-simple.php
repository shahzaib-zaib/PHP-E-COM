<?php
include "includes/config.php";
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE product_id={$id}";
		$query_p = mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p = mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['pid']]=array("quantity" => 1, "price" => $row_p['product_price']);
					echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='index.php?page=shop'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}

?>
<main class="single-page">
 	<div class="breadcrumb-holder">
	 <?php

				include "includes/config.php";


				$pro_id = $_GET['pid'];

				$sql = "SELECT * FROM products ";

				$result = mysqli_query($con, $sql) or die ("Query Faild.");

				if(mysqli_num_rows($result) > 0){
					
					while($row = mysqli_fetch_assoc($result)){

			?>
		<div class="container">
			<ul class="breadcrumb pull-left">
				<li><a href="index.php?page=home">Home</a></li>
				<li><a href="index.php?page=categories-grid">Men</a></li>
				<li><a href="index.php?page=catalog">New Arrivals</a></li>
				<li class='active'><?php echo $row['product_name']; ?></li>
			</ul><!--breadcrumb-->
			
			<div class="nav-links clearfix">
				<a href="index.php?page=product-extended&pid=<?php echo $row['product_id']; ?>" class="prev"><i class="icon icon-pagination-left icon-prev"></i>Previous</a>
				<a href="index.php?page=product-extended&pid=<?php echo $row['product_id']; ?>" class="next">Next<i class="icon icon-pagination-right icon-next"></i></a>
			</div><!--nav-links-->
		</div><!--container-->
	</div><!--breadcrumb-holder-->
	<?php require_once ROOT.'/parts/product-simple/primary-block.php'; ?>
	<?php require_once ROOT.'/parts/products/single-product-tab.php'; ?>
</main><!--single-page-->
<?php
		}
	}
?>
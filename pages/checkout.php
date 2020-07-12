<div class="page-header">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Shopping Bag</a></li>
			<li class="active">Checkout</li>
		</ol>
	</div>
</div>

<section class="checkout container">
	<div class="row">
		<section class="billing-address col-md-4">
			<header>
				<h3 class="section-title"><span class="step-no">1.</span> Billing Address</h3>
			</header>
			<div class="billing-address-form">
				<form>
					<div class="form-group">
						<label for="first-name">First Name</label>
						<input type="text" class="form-control" id="first-name">
					</div>
					<div class="form-group">
						<label for="last-name">Last Name</label>
						<input type="text" class="form-control" id="last-name">
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="street-address">Street Address</label>
						<input type="text" class="form-control" id="street-address">
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city">
					</div>
					<div class="form-group">
						<label for="zip-code">Zip Code</label>
						<input type="text" class="form-control" id="zip-code">
					</div>
					<div class="form-group">
						<label for="company">Company</label>
						<input type="text" class="form-control" id="company">
					</div>
					<div class="form-group checkbox">
						<label>
							<input type="checkbox"> Create an account for later use
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Ship to the same address
						</label>
					</div>
				</form>
			</div>
		</section>
        <div class="col-md-3">
			<section class="shipping-method">
				<header>
					<h3 class="section-title"><span class="step-no">2.</span> Shipping Method</h3>
				</header>
				<ul class="shipping-methods list-unstyled">
					<li class="radio"><label><input type="radio" name="shipping-method"> Standard $8.99 <small>(3-7 business days)</small></label></li>
					<li class="radio"><label><input type="radio" name="shipping-method"> Two Days $12.99 <small>(2 business days)</small></label></li>
					<li class="radio"><label><input type="radio" name="shipping-method"> Next Day $15.99 <small>(2 business day)</small></label></li>
				</ul>
			</section>
			<section class="shipping-method">
				<header>
					<h3 class="section-title"><span class="step-no">3.</span> Payment Method</h3>
				</header>
				<ul class="payment-methods list-unstyled">
					<li class="radio"><label><input type="radio" name="payment-method"> PayPal Express</label></li>
					<li class="radio"><label><input type="radio" name="payment-method"> Credit Card</label></li>
				</ul>
			</section>
		</div>
	</div>
</section>
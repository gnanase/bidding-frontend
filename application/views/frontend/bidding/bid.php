	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo PRODUCT_IMAGE_PATH.$product_details['image']; ?>" alt="" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $product_details['name'];  ?></h2>
								<p> product code : <?php echo $product_details['code'];  ?></p>
								<p><?php echo $product_details['desc']; ?></p>
								<span>
									<span>product price : $<?php echo $product_details['price']; ?></span>
									<p>minimum price : $<?php echo $product_details['min_price']; ?></p>
									<p>bid fee : $<?php echo $product_details['bid_fee']; ?></p>									
								</span>
								<span>	
									
									<form method="post" action="" style="float: left;"> 
										<label style="float: left; margin-top: 5px;">Bid Amount:</label>
										<input type="text" name="bid" onkeypress="return isNumber(event)"/>
										<input type="hidden" name="pid" value="<?php echo $product_details['product_id']; ?>"/>
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Bid
										</button>
									</form>
									<div style="clear:both; float:left">
									<?php if (isset($ErrorMessages) && $ErrorMessages != NULL){
											echo $ErrorMessages;
										} ?>
									</div>
								</span>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	
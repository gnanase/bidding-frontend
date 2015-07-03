	<section id="form" style="margin-top:0px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-6">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" id="login" action="">
							<div class="form-group has-feedback">
								<input type="email"  name="email" value="<?php echo set_value('email');?>" class="form-control required email" placeholder="Email" />
								<?php echo form_error('email'); ?>
							</div>
							<div class="form-group has-feedback">
								<input type="password" name="password" class="form-control required" id="password" placeholder="Password" />
								<?php echo form_error('password');  ?>
							</div>
							<?php 
							   if (isset($InvalidMessages) && $InvalidMessages != NULL)
							   {
							       		echo '<div class="error">';
							       		echo $InvalidMessages; 
							      		echo '</div>';
								}?>
											
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
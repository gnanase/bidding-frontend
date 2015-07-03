 
 
 <section id="form" style="margin-top: 0px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class=" clear" style="clear:both;">
		             <?php if ($this->session->flashdata('SucMessage')!='') { ?>
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
							<?php echo $this->session->flashdata('SucMessage');  ?>
					    </div> 
		             <?php } ?>
	           	</div> 
				<div class="col-sm-4 col-sm-offset-6">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="useradd"  method="post" action="">
							<div class="form-group has-feedback">
								<input type="text" name="name" class="form-control required" value="<?php echo set_value('name');?>" id="name" placeholder="User Name" >
							</div>
							<div class="form-group has-feedback">
								<input type="password" name="password"  class="form-control required" id="InputPassword1" placeholder="Password">
							</div>
							<div class="form-group has-feedback">
								<input type="email"  name="email"  value="<?php echo set_value('email');?>" class="form-control required email" id="InputEmail1" placeholder="Enter Email">
							</div>
							<div class="form-group has-feedback">
								<input type="text"  name="phone"  value="<?php echo set_value('phone');?>" class="form-control phone" id="InputPhone" placeholder="Enter Phone number" onkeypress="return isNumber(event)" >
							</div>
							<div class="form-group has-feedback">
							<textarea rows="5" cols="10"  name="address" class="form-control required " id="InputAddress" placeholder="Enter Address"autocomplete="off"><?php echo set_value('address');?></textarea>
							</div>
							<?php 
			                   if (isset($ErrorMessages) && $ErrorMessages != NULL)
			                   {
			                   		print_r($ErrorMessages);
			                   }
			                ?>   
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	

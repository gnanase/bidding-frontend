 
 
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
						<h2>Edit User Details</h2>
						<form id="useradd"  method="post" action="">
							<input type="text" name="name" class="form-control required" value="<?php if(set_value('name')) echo set_value('name'); else echo $users_details['name']; ?>" id="name" placeholder="User Name" >
							<input type="password" name="password"  class="form-control required" value="<?php echo AES_Decode($users_details['password']); ?>" id="InputPassword1" placeholder="Password">
							<input type="email"  name="email"  value="<?php if(set_value('email')) echo set_value('email'); else echo $users_details['email']; ?>" class="form-control required email" id="InputEmail1" placeholder="Enter Email">
							<input type="text"  name="phone"  value="<?php if(set_value('phone')) echo set_value('phone'); else echo $users_details['phone']; ?>" class="form-control phone" id="InputPhone" placeholder="Enter Phone number" onkeypress="return isNumber(event)" >
							<textarea rows="5" cols="10"  name="address" class="form-control required " id="InputAddress" placeholder="Enter Address"autocomplete="off"><?php if(set_value('address')) echo set_value('address'); else echo $users_details['address'];  ?></textarea>
							<?php 
			                   if (isset($ErrorMessages) && $ErrorMessages != NULL)
			                   {
			                   		print_r($ErrorMessages);
			                   }
			                ?>   
							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	

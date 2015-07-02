 
 
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
						<h2>User Details</h2>
						<form id="useradd"  method="post" action="">
							<input type="text" class="form-control required" value="<?php  echo $users_details['name']; ?>" id="name" disabled>
							<input type="email"  value="<?php echo $users_details['email']; ?>" class="form-control required email" id="InputEmail1" disabled>
							<input type="text"  value="<?php  echo $users_details['phone']; ?>" class="form-control phone" id="InputPhone" disabled >
							<textarea rows="5" cols="10" class="form-control required " id="InputAddress" disabled><?php echo $users_details['address'];  ?></textarea>
							<a href="<?php  echo base_url(); ?>users/edit/<?php echo md5($users_details['user_id']); ?>" class="btn btn-default">Edit</a>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	

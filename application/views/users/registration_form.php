<?php $this->view('comman/hearder.php'); ?>

		<script type="text/javascript">
			$( document ).ready(function() {
	    		$('form').attr('autocomplete', 'off');
	    		$('input').attr('autocomplete', 'off');
			});
		</script>
		<h1 class="page-header text-center">Add Item</h1>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h3>Add Item
					<span class="pull-right"><a href="<?php echo base_url().'userauthentication/user_login_process'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
				</h3>
				<hr>
				<form method="post" action="<?php echo base_url(); ?>userauthentication/new_user_registration" accept-charset="utf-8">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="username" value=""  />
					</div>
					<div class='error_msg'>
						<?php
							if (isset($message_display)) {
								echo $message_display;
							}
						?>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" name="email_value" class="form-control" value=""  />
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password" value=""/>
					</div>
					
					 
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Sign Up</button>
					<a href="<?php echo base_url().'userauthentication'; ?> ">For Login Click Here</a>
				</form>
			</div>
		</div>
<?php $this->view('comman/footer.php'); ?>


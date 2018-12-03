<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"> -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/common.js"></script>
</head>
<body>
	<?php

		if (isset($this->session->userdata['logged_in'])) {
			header("location: ".base_url()."admin/admin_page/");

		}
	?>

<div class="container">

		<script type="text/javascript">
			jQuery( document ).ready(function() {
	    		jQuery('form').attr('autocomplete', 'off');
	    		jQuery('input').attr('autocomplete', 'off');
			});
		</script>
		<h1 class="page-header text-center">User Registration</h1>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h3>User Registration
					<span class="pull-right"><a href="<?php echo base_url().'userauthentication/user_login_process'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
				</h3>
				<hr>
				<form method="post" id="registration" action="<?php echo base_url(); ?>userauthentication/new_user_registration" accept-charset="utf-8">
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


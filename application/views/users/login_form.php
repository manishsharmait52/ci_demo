<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>CodeIgniter Login</title>
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
			header("location: ".base_url()."userauthentication/user_login_process");

		}
	?>

<div class="container">

		<?php
			if (isset($logout_message)) {
				echo "<div class='message'>";
				echo $logout_message;
				echo "</div>";
			}
		?>
		<?php
		if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
		}
		?>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2>Login Form</h2>
				<hr/>
				<form method="post" id="login" action="<?php echo base_url(); ?>userauthentication/user_login_process" accept-charset="utf-8">
					<?php //echo form_open('userauthentication/user_login_process'); ?>
					<?php
						echo "<div class='error_msg'>";
						if (isset($error_message)) {
							echo $error_message;
						}
						echo validation_errors();
						echo "</div>";
					?>
					<div class="form-group">
						<label>UserName :</label>
						<input type="text" name="username" id="name" class="form-control" placeholder="username"/><br /><br />
					</div>					
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="**********"/><br/><br />
					</div>					
					<div class="form-group">					
						<input type="submit" value="Login" class="btn btn-primary" name="submit"/><br />
						<a href="<?php echo base_url() ?>userauthentication/user_registration_show">To SignUp Click Here</a>
					</div>
				<?php //echo form_close(); ?>
				</form>
			</div>
		</div>
<?php $this->view('comman/footer.php'); ?>
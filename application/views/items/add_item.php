<?php $this->view('comman/hearder.php'); ?>

	<h1 class="page-header text-center">Add Item</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Add Item
				<span class="pull-right"><a href="<?php echo base_url().'userauthentication/user_login_process'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>/items/insert"  enctype="multipart/form-data">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" class="form-control" name="description">
				</div>
				<div class="form-group">
					<label>Size:</label>
					<input type="checkbox" class="btn btn-primary" name="size[]" value='Normal'>Normal
					<input type="checkbox" class="btn btn-primary" name="size[]" value='Medium'>Medium
					<input type="checkbox" class="btn btn-primary" name="size[]" value='Large'>Large 
				</div>

				<div class="form-group">
					<label>Type:</label>
					<input type="radio" class="btn btn-primary" name="type" value='hard'>Hard
					<input type="radio" class="btn btn-primary" name="type" value='soft'>Soft
				</div>
				<div class="col-auto my-1">
				    <label>Preference</label>
				    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
				    	<option selected name="preference">Choose...</option>
				        <option value="1">One</option>
				        <option value="2">Two</option>
				        <option value="3">Three</option>
				    </select>
			    </div>
			    <div class="form-group">
					<label>date:</label>
					<input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>" min="1981-01-01" max="2023-12-31">
				</div>
				<div class="form-group">
					<label>File:</label>
					<input type="file" class="form-control" name="itemfile" size="20" /> 
				</div>
				 
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
		</div>
	</div>
	
<?php $this->view('comman/footer.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center"></h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Edit Item
				<span class="pull-right"><a href="<?php echo base_url().'userauthentication/user_login_process'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php
			// var_dump($item);
			// exit;
			$Size = explode(",", $item['size']);
			extract($item);  ?>
			<form method="POST" action="<?php echo base_url(); ?>items/update/<?php echo $id; ?>" enctype="multipart/form-data"> 
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" class="form-control" value="<?php echo $description; ?>" name="description">
				</div>
				<div class="form-group">
					<label>Size:</label>
					<?php
					
					$size_array = array('Normal','Medium','Large');
					$data_print = '';
					foreach ($size_array as $key => $value) {
						$print = 0;
						foreach ($Size as $sskey => $ssvalue) {
							if($value == $ssvalue){
									$print = 1;
							}
						}
						if($print == 1){
							echo "<input type='checkbox' class='btn btn-primary' name='size[]' value='".$value."' checked>".$value;
						}else{
							echo "<input type='checkbox' class='btn btn-primary' name='size[]' value='".$value."'>".$value;
						}
					}
					?>
				</div>

				<div class="form-group">
					<label>Type:</label>
					<input type="radio" class="btn btn-primary" name="type" value='hard' <?php echo (($type == 'hard')? 'checked' : '')?>>Hard
					<input type="radio" class="btn btn-primary" name="type" value='soft' <?php echo (($type == 'soft')? 'checked' : '')?>>Soft
				</div>

				<div class="col-auto my-1">
				    <label>Preference</label>
				    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
				    	<option <?php echo (($preference == 0)? 'selected' : '')?>>Choose...</option>
				        <option value="1" <?php echo (($preference == 1)? 'selected' : '')?>>One</option>
				        <option value="2" <?php echo (($preference == 2)? 'selected' : '')?>>Two</option>
				        <option value="3" <?php echo (($preference == 3)? 'selected' : '')?>>Three</option>
				    </select>
			    </div>

			    <div class="form-group">
					<label>date:</label>
					<input type="date" class="form-control" name="date" value="<?php echo $date; ?>" min="1981-01-01" max="2023-12-31">
				</div>

				<div class="form-group">
					<label>File:</label>
					<input type="hidden" class="form-control" name="itemfile_old" value="<?php echo $file_name;?>" />
					<input type="file" class="form-control" name="itemfile" size="20" /> 
					<img src=" <?php echo base_url().'assets/uploads/'.$file_name; ?>" style="height: 100px;">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
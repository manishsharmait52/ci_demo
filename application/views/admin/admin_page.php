<?php $this->view('comman/hearder.php'); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
		
			<div class="row">
				<div class="col-sm-12">
					<h3>Item list</h3>
					<hr>
					<div class="logout">
						<p><a href="logout" class="btn btn-primary">Logout</a></p>
						<p><a href="<?php echo BASE_URL;?>items/add_item" class="btn btn-primary">Add</a></p>
					
						<script type="text/javascript">
						$(document).ready(function() {
							var url_path = "<?php echo BASE_URL;?>"+"items/get_items";
							//console.log(url+"items/get_items");
						    $('#item-table').DataTable({
						    	"ajax": {
						            url : url_path,
						            type : 'GET'
						        },
						    });
						});
						</script>
						<table id="item-table">
							<thead>
								<tr><td>ID</td><td>Name</td><td>Description</td><td>Action</td></tr>
							</thead>
							<tbody>

							</tbody>
						</table>
						<br/>
					</div>
				</div>
			</div>
<?php $this->view('comman/footer.php'); ?>
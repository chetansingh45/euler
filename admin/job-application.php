<?php include 'includes/header.php'?>
<div class="row align-items-center">
	<div class="col-md-6">
		<a href="new-job.php" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Job</a>
	</div>
	<div class="col-md-6">
		<div class="input-group search-area">
			<input type="text" class="form-control h-auto" placeholder="search job title here...">
			<span class="search-btn"><a href="javascript:void(0)" class="btn btn-primary rounded-circle"><i class="flaticon-381-search-2"></i></a></span>
		</div>
	</div>
</div>
<!-- Table -->
<div class="table-responsive mt-4">
	<table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
		<thead>
			<tr>
				<th>No</th>
				<th>Position</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Applied On</th>
				<th>Submitted By</th>
				<th>Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1.</td>
				<td class="wspace-no">Database analyst</td>
				<td>Jordan</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Nicholas</td>
				<td><span class="btn btn-warning btn-sm btn-rounded">Pending</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
			<tr>
				<td>2.</td>
				<td class="wspace-no">Network architect</td>
				<td>Asher</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Dominic</td>
				<td><span class="btn btn-warning btn-sm btn-rounded">Pending</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
			<tr>
				<td>3.</td>
				<td class="wspace-no">Network architect</td>
				<td>Carter</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Austin</td>
				<td><span class="btn btn-info btn-sm btn-rounded">Pending</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
			<tr>
				<td>4.</td>
				<td class="wspace-no">Systems analyst</td>
				<td>Grayson</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Everett</td>
				<td><span class="btn btn-danger btn-sm btn-rounded">Rejected</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
			<tr>
				<td>5.</td>
				<td class="wspace-no">Network engineer</td>
				<td>Thomas</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Brooks</td>
				<td><span class="btn btn-warning btn-sm btn-rounded">Pending</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
			<tr>
				<td>6.</td>
				<td class="wspace-no">Service desk analyst</td>
				<td>Miles</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Wesley</td>
				<td><span class="btn btn-primary btn-sm btn-rounded">Selected</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
			<tr>
				<td>7.</td>
				<td>Network Engineer</td>
				<td>Adrian</td>
				<td>Jordan@gmail.com</td>
				<td>1234598765</td>
				<td>24-01-2021</td>
				<td>Kayden</td>
				<td><span class="btn btn-success btn-sm btn-rounded">Success</span>
				</td>
				<td class="action-btn wspace-no text-center">	
                    <span><a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a></span>
					<span><a href="user-profile.php"><i class="fas fa-eye"></i></a></span>
                    <span><a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a></span>
					<span><a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php include 'includes/footer.php'?>
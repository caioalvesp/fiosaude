<!DOCTYPE html>
<html>

<head>
	<title>PHP/MySQLi CRUD Operation using Bootstrap/Modal</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="text-center" style="margin: 20px 0;">
			<h2 class="text-primary" style="font-size: 22px;"><strong>Departamentos</strong></h2>
		</div>

		<div class="text-center">
			<div class="btn-group">
				<a href="../user/index.php" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Usuários</a>
				<a href="../project/index.php" class="btn btn-success"><span class="glyphicon glyphicon-folder-open"></span> Projetos</a>
			</div>
		</div>

		<div style="margin: 20px 0;">
			<a href="#addnew" data-toggle="modal" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus"></span> Add New
			</a>
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include('../conn.php');

					$query = mysqli_query($conn, "SELECT * FROM `department`");
					while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo ucwords($row['name']); ?></td>
							<td>
								<a href="#edit<?php echo $row['departmentid']; ?>" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
								<a href="#del<?php echo $row['departmentid']; ?>" data-toggle="modal" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('button.php'); ?>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<?php require_once('add_modal.php'); ?>
	</div>
</body>

</html>
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
		<div style="height:50px;"></div>
		<div class="well" style="margin:auto; padding:auto; width:80%;">
			<span style="font-size:25px; color:blue">
				<center><strong>PHP/MySQLi CRUD Operation using Bootstrap</strong></center>
			</span>
			<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
			<div style="height:50px;"></div>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Salary</th>
					<th>Department</th>
					<th>Projects</th>
					<th>Action</th>
				</thead>

				<tbody>
					<?php
					include('../conn.php');

					$query = mysqli_query($conn, "
					SELECT u.userid, u.firstname, u.lastname, u.address, u.salary, 
								 ANY_VALUE(d.name) AS department_name, 
								 COALESCE(GROUP_CONCAT(DISTINCT p.name ORDER BY p.name SEPARATOR ', '), 'Sem projetos') AS project_names 
					FROM user u 
					LEFT JOIN `department-user` du ON u.userid = du.userid 
					LEFT JOIN department d ON du.departmentid = d.departmentid
					LEFT JOIN `project-user` pu ON u.userid = pu.userid
					LEFT JOIN project p ON pu.projectid = p.projectid
					GROUP BY u.userid, u.firstname, u.lastname, u.address, u.salary;
			");


					while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo ucwords($row['firstname']); ?></td>
							<td><?php echo ucwords($row['lastname']); ?></td>
							<td><?php echo $row['address']; ?></td>
							<td><?php printf("%.2f", (float)$row['salary']); ?></td>
							<td><?php echo $row['department_name'] ? ucwords($row['department_name']) : 'Não atribuído'; ?></td>
							<td><?php echo $row['project_names'] ? ucwords($row['project_names']) : 'Sem projetos'; ?></td>
							<td>
								<a href="#edit<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
								<a href="#del<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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
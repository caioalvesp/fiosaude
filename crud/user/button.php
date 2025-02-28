<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Delete</h4>
				</center>
			</div>
			<div class="modal-body">
				<?php
				$del = mysqli_query($conn, "select * from user where userid='" . $row['userid'] . "'");
				$drow = mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5>
						<center>Are you sure to delete <strong><?php echo ucwords($drow['firstname'] . ' ' . $row['lastname']); ?></strong> from the list? This method cannot be undone.</center>
					</h5>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<a href="delete.php?id=<?php echo $row['userid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
			</div>

		</div>
	</div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Edit</h4>
				</center>
			</div>
			<div class="modal-body">
				<?php
				$edit = mysqli_query($conn, "
						SELECT u.*, du.departmentid, GROUP_CONCAT(p.projectid) AS projects 
						FROM user u 
						LEFT JOIN `department-user` du ON u.userid = du.userid 
						LEFT JOIN `project-user` pu ON u.userid = pu.userid
						LEFT JOIN project p ON pu.projectid = p.projectid
						WHERE u.userid='" . $row['userid'] . "'
						GROUP BY u.userid, du.departmentid
					");

				$erow = mysqli_fetch_array($edit);

				$dept_query = mysqli_query($conn, "SELECT departmentid, name FROM department ORDER BY name");
				$projects_selected = explode(',', $erow['projects']);
				?>
				<div class="container-fluid">
					<form method="POST" action="edit.php?id=<?php echo $erow['userid']; ?>">
						<div class="row">
							<div class="col-lg-2">
								<label style="position:relative; top:7px;">Firstname:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="firstname" class="form-control" value="<?php echo $erow['firstname']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position:relative; top:7px;">Lastname:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="lastname" class="form-control" value="<?php echo $erow['lastname']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position:relative; top:7px;">Address:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="address" class="form-control" value="<?php echo $erow['address']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position:relative; top:7px;">Salary:</label>
							</div>
							<div class="col-lg-10">
								<input type="number" step=".01" name="salary" class="form-control" value="<?php echo $erow['salary']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position:relative; top:7px;">Department:</label>
							</div>
							<div class="col-lg-10">
								<select name="department_id" class="form-control">
									<option value="">Select Department</option>
									<?php
									while ($dept = mysqli_fetch_array($dept_query)) {
										$selected = ($dept['departmentid'] == $erow['departmentid']) ? 'selected' : '';
										echo '<option value="' . $dept['departmentid'] . '" ' . $selected . '>' . $dept['name'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position:relative; top:7px;">Projects:</label>
							</div>
							<div class="col-lg-10">
								<select name="projects[]" class="form-control" multiple>
									<?php
									$project_query = mysqli_query($conn, "SELECT * FROM project");
									while ($project = mysqli_fetch_array($project_query)) {
										$selected = in_array($project['projectid'], $projects_selected) ? 'selected' : '';
										echo '<option value="' . $project['projectid'] . '" ' . $selected . '>' . $project['name'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>
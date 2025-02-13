<?php
$query_departments = "SELECT departmentid, name FROM department ORDER BY name";
$result_departments = mysqli_query($conn, $query_departments);

$query_projects = "SELECT projectid, name FROM project ORDER BY name";
$result_projects = mysqli_query($conn, $query_projects);
?>

<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Add New</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="addnew.php">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Firstname:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="firstname">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Lastname:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="lastname">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Address:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="address">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Salary:</label>
							</div>
							<div class="col-lg-10">
								<input type="number" step=".01" class="form-control" name="salary">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Departamento:</label>
							</div>
							<div class="col-lg-10">
								<select name="departament_id" class="form-control" required>
									<option value="">Selecione um departamento</option>
									<?php
									while ($row = mysqli_fetch_assoc($result_departments)) {
										echo '<option value="' . $row['departmentid'] . '">' . $row['name'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div style="height:10px;"></div>

						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Projetos:</label>
							</div>
							<div class="col-lg-10">
								<select name="projects[]" class="form-control" multiple required>
									<option value="">Selecione um ou mais projetos</option>
									<?php
									$query = "SELECT projectid, name FROM project ORDER BY name";
									$result = mysqli_query($conn, $query);

									while ($row = mysqli_fetch_assoc($result)) {
										echo '<option value="' . $row['projectid'] . '">' . $row['name'] . '</option>';
									}
									?>
								</select>


								<small>Segure Ctrl (Windows) ou Command (Mac) para selecionar múltiplos projetos.</small>
							</div>
						</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"></span> Cancel
				</button>
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-floppy-disk"></span> Save
				</button>
				</form>
			</div>
		</div>
	</div>
</div>
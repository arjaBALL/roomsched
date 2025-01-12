<?php
include('./connection/session.php');
include('./components/header.php');
include('./connection/dbcon.php');
include('./components/nav-top1.php');
include('./components/main.php');
?>


<div class="wrapper">
	<div id="element" class="hero-body-subject-add">
		<div class="nav-content">

			<h2>
				<font color="white">Teachers List</font>
			</h2>
			<a class="btn btn-primary" href="add_teacher.php"> <i class="icon-plus-sign icon-large"></i>&nbsp;Add
				Teacher</a>
			<hr>
			<table class="center-users-table">

				<div class="demo_jui">
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>

							<?php $result = mysqli_query($conn, "SELECT TeacherID, FirstName, LastName FROM teachers") or die(mysqli_error($conn));
							while ($row = mysqli_fetch_array($result)) {
								$id = $row['TeacherID'];
								?>
								<tr class="del<?php echo $id ?>">
									<td><?php echo $row['FirstName']; ?></td>
									<td><?php echo $row['LastName']; ?></td>
									<td align="center" width="160">

										<a class="btn btn-info" href="edit_teacher.php<?php echo '?TeacherID=' . $id; ?>"><i
												class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;



										<div class="modal hide fade" id="<?php echo $id; ?>">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">�</button>
												<div class="alert alert-info">
													<p>
														<font color="gray">Are you Sure you Want to Delete this Teacher
															Entry?</font>
													</p>
												</div>
											</div>
											<div class="modal-body">


												<a class="btn btn-info"
													href="delete_teacher.php<?php echo '?id=' . $id; ?>"><i
														class="icon-check icon-large"></i>&nbsp;Yes</a>&nbsp;

												<a href="#" class="btn" data-dismiss="modal">No</a>


											</div>
											<div class="modal-footer">

											</div>
										</div>


										<a class="btn btn-danger1" data-toggle="modal" href="#<?php echo $id; ?>"> <i
												class="icon-trash icon-large"></i>&nbsp;Delete</a>
									</td>




								<?php } ?>
							</tr>

						</tbody>
					</table>
			</table>
		</div>





	</div>
</div>
</div>
</body>
<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">�</button>
		<h3> </h3>
	</div>
	<div class="modal-body">
		<p>
			<font color="gray">Are You Sure you Want to LogOut?</font>
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">No</a>
		<a href="index.php" class="btn btn-primary">Yes</a>
	</div>
</div>
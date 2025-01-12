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
				<font color="white">Subject List</font>
			</h2>
			<a class="btn btn-primary" href="add_subject.php"><i class="icon-plus-sign icon-large"></i>&nbsp;Add
				Subject</a>
			<hr>
			<table class="users-table">
				<div class="demo_jui">
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
						<thead>
							<tr>
								<th>Subject Name</th>
								<th>Subject Description</th>
								<th>Teacher</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($conn, "SELECT s.subjectID, s.subject_name, s.subject_code, t.TeacherID, CONCAT(t.FirstName, ' ', t.LastName) AS TeacherName 
                                                          FROM subjects s 
                                                          INNER JOIN teachers t ON s.TeacherID = t.TeacherID") or die(mysqli_error($conn));
							while ($row = mysqli_fetch_array($result)) {
								$id = $row['SubjectID']; // Corrected variable from 'Subject_id' to 'SubjectID'
								?>
								<tr class="del<?php echo $id ?>">
									<td><?php echo $row['SubjectName']; ?></td>
									<td><?php echo $row['SubjectDescription']; ?></td>
									<td><?php echo $row['TeacherName']; ?></td>
									<td align="center" width="200">
										<a class="btn btn-info" href="edit_subject.php?id=<?php echo $id; ?>"><i
												class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;
										<!-- Modal for delete confirmation -->
										<a class="btn btn-danger" data-toggle="modal"
											href="#deleteModal<?php echo $id; ?>"><i
												class="icon-trash icon-large"></i>&nbsp;Delete</a>

										<div class="modal hide fade" id="deleteModal<?php echo $id; ?>" tabindex="-1"
											role="dialog" aria-hidden="true">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-hidden="true">&times;</button>
												<div class="alert alert-info">
													<p>
														<font color="gray">Are you sure you want to delete this subject
															entry?</font>
													</p>
												</div>
											</div>
											<div class="modal-body">
												<a class="btn btn-info" href="delete_subject.php?id=<?php echo $id; ?>"><i
														class="icon-check icon-large"></i>&nbsp;Yes</a>&nbsp;
												<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">No</a>
											</div>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</table>
		</div>
	</div>
</div>

<!-- LogOut Modal -->
<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3> </h3>
	</div>
	<div class="modal-body">
		<p>
			<font color="gray">Are You Sure You Want to Log Out?</font>
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">No</a>
		<a href="logout.php" class="btn btn-primary">Yes</a>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.btn-danger').click(function () {
			var id = $(this).attr("id");

			if (confirm("Are you sure you want to delete this Subject?")) {
				$.ajax({
					type: "POST",
					url: "delete_subject.php",
					data: { id: id },
					cache: false,
					success: function (html) {
						$(".del" + id).fadeOut('slow');
					}
				});
			} else {
				return false;
			}
		});
	});
</script>
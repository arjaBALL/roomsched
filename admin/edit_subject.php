<?php
include('./connection/session.php');
include('./components/header.php');
include('./connection/dbcon.php');
include('./components/nav-top1.php');
include('./components/main.php');
include('./components/side.php');

$id_get = $_GET['id'];

// Fetch the teacher and subject data
$result_teachers = mysqli_query($conn, "SELECT * FROM teachers");
$result_subjects = mysqli_query($conn, "SELECT * FROM subjects");
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Subject</title>
	<link rel="stylesheet" href="addsched.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<div class="wrapper">
	<div id="element" class="hero-body-subject-add">
		<div class="nav-content">
			<h2>
				<font color="white">Edit Subject</font>
			</h2>
			<a class="btn btn-primary" href="subject.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
			<hr>
			<form id="save_voter" class="form-horizontal" method="POST">
				<fieldset>
					<?php
					$result = mysqli_query($conn, "SELECT * FROM subjects WHERE SubjectID='$id_get'") or die(mysqli_error($conn));
					$row = mysqli_fetch_array($result);
					?>

					<input type="hidden" name="id_get" class="id_get" value="<?php echo $id_get; ?>">

					<div class="add_subject">
						<ul class="thumbnails_new_voter">
							<li class="span3">
								<div class="thumbnail_new_voter">
									<!-- Confirmation and Error Messages -->
									<div class="confirmation" id="confirmation-message" style="display: none;">
										<i class="fas fa-check-circle"></i>
										<span>Subject has been successfully updated.</span>
									</div>
									<div class="error" id="error-message" style="display: none;">
										<i class="fas fa-times-circle"></i>
										<span>Error: Unable to update subject. Please try again.</span>
									</div>
									<div class="control-group">
										<label class="control-label" for="subjectname">Subject Name:</label>
										<div class="controls">
											<input class="item" type="text" name="subjectname" class="subjectname"
												value="<?php echo $row['SubjectName']; ?>" required>
										</div>
									</div>

									<!-- Subject Description -->
									<div class="control-group">
										<label class="control-label" for="subjectdescription">Subject
											Description:</label>
										<div class="controls">
											<input class="item" type="text" id="subjectdescription"
												name="subjectdescription"
												value="<?php echo htmlspecialchars($row['SubjectDescription']); ?>"
												required>
										</div>
									</div>

									<!-- Teacher Dropdown -->
									<div class="control-group">
										<label class="control-label" for="teacher">Teacher:</label>
										<div class="controls">
											<select class="item" id="select-teacher" name="teacher" required>
												<option value="">Select Teacher</option>
												<?php while ($teacher = mysqli_fetch_assoc($result_teachers)): ?>
													<option value="<?php echo $teacher['TeacherID']; ?>" <?php echo ($teacher['TeacherID'] == $row['TeacherID']) ? 'selected' : ''; ?>>
														<?php echo $teacher['FirstName'] . ' ' . $teacher['LastName']; ?>
													</option>
												<?php endwhile; ?>
											</select>
										</div>
									</div>


									<!-- Submit Button -->
									<div class="control-group">
										<div class="controls">
											<button id="save_voter" class="btn btn-primary" type="submit"><i
													class="icon-save icon-large"></i> Save</button>
										</div>
									</div>

								</div>
							</li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			// Handle the form submission via AJAX
			$('#save_voter').submit(function (event) {
				event.preventDefault(); // Prevent the default form submission

				// Get form data
				var formData = $(this).serialize();

				// Log form data for debugging
				console.log('Form Data:', formData);

				$.ajax({
					url: 'update_subject.php', // The backend PHP script
					type: 'POST',
					data: formData,
					dataType: 'json',
					success: function (response) {
						console.log('Response:', response); // Log the response for debugging
						if (response.status === 'success') {
							// Show confirmation message if the update was successful
							$('#confirmation-message').show().find('span').text(response.message);
							$('#error-message').hide();
						} else {
							// Show error message if there's an issue (like duplication)
							$('#error-message').show().find('span').text(response.message);
							$('#confirmation-message').hide();
						}
					},
					error: function (xhr, status, error) {
						// Log the error details for debugging
						console.log('XHR:', xhr);
						console.log('Status:', status);
						console.log('Error:', error);

						// Show generic error message if something unexpected happens
						$('#error-message').show().find('span').text('An unexpected error occurred.');
						$('#confirmation-message').hide();
					}
				});
			});
		});
	</script>


	<?php include('footer.php'); ?>
</div>
</body>

<!-- Modal for logout -->
<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3> </h3>
	</div>
	<div class="modal-body">
		<p>
			<font color="gray">Are You Sure you Want to LogOut?</font>
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">No</a>
		<a href="logout.php" class="btn btn-primary">Yes</a>
	</div>
</div>
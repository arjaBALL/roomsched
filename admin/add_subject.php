<?php
include('./connection/session.php');
include('./components/header.php');
include('./connection/dbcon.php');
include('./components/nav-top1.php');
include('./components/main.php');
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Teacher</title>
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
				<font color="black">Add Subject</font>
			</h2>
			<a class="btn btn-primary" href="subject.php"><i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
			<hr>
			<form id="save_voter" class="form-horizontal" method="POST" action="save_subject.php">
				<fieldset>
					</br>
					<div class="add_subject">
						<ul class="thumbnails_new_voter">


							<li class="span3">
								<div class="thumbnail_new_voter">
									<!-- Confirmation and Error Messages -->
									<div class="confirmation" id="confirmation-message" style="display: none;">
										<i class="fas fa-check-circle"></i>
										<span>Subject has been successfully added.</span>
									</div>
									<div class="error" id="error-message" style="display: none;">
										<i class="fas fa-times-circle"></i>
										<span>Error: The subject is already added.</span>
									</div>
									<div class="control-group">
										<label class="control-label" for="input01">Subject Name:</label>
										<div class="controls">
											<input type="text" name="subjectName" required class="item">

										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="input01">Subject Description:</label>
										<div class="controls">
											<input class="item" type="text" name="subjectDescription">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="input01">Teacher:</label>
										<div class="controls">
											<select style="width: 75%; " id="select-teacher" name="teacherID" required>
												<option value="">Select a Teacher</option>
												<?php
												include 'fetch_teacher.php';
												while ($teacher = $teachers_result->fetch_assoc()) { ?>
													<option value="<?php echo $teacher['TeacherID']; ?>">
														<?php echo $teacher['TeacherName']; ?>
													</option>
												<?php } ?>
											</select>
										</div>
									</div>



									<div class="control-group">
										<div class="controls">
											<button id="save_voter" class="btn btn-primary" name="save"><i
													class="icon-save icon-large"></i>Save</button>
										</div>
									</div>


				</fieldset>
			</form>


		</div>





	</div>
</div>
<script>
	$(document).ready(function () {
		// Initialize Select2 plugin for teacher dropdown
		$('#select-teacher').select2();

		// Handle the form submission via AJAX
		$('#save_voter').submit(function (event) {
			event.preventDefault(); // Prevent the default form submission

			// Get form data
			var formData = $(this).serialize();

			$.ajax({
				url: 'save_subject.php', // This should point to the PHP script that handles saving the subject
				type: 'POST',
				data: formData,
				dataType: 'json', // Expect a JSON response
				success: function (response) {
					if (response.status === 'success') {
						// Display success message
						$('#confirmation-message').show().find('span').text(response.message);
						$('#error-message').hide();
					} else {
						// Display error message
						$('#error-message').show().find('span').text(response.message);
						$('#confirmation-message').hide();
					}
				},
				error: function () {
					// Handle unexpected error
					$('#error-message').show().find('span').text('An unexpected error occurred.');
					$('#confirmation-message').hide();
				}
			});
		});
	});
</script>

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
		<a href="logout.php" class="btn btn-primary">Yes</a>
	</div>
</div>
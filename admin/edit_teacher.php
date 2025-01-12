<?php
include('./connection/session.php');
include('./components/header.php');
include('./connection/dbcon.php');
include('./components/nav-top1.php');
include('./components/main.php');

// Fetch data for a specific teacher
if (isset($_GET['TeacherID'])) {
	$teacher_id = $_GET['TeacherID'];
	$sql = "SELECT * FROM teachers WHERE TeacherID = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $teacher_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$teacher = $result->fetch_assoc();
} else {
	die("Teacher ID not provided.");
}

// Update teacher data
if (isset($_POST['update'])) {
	$teacher_id = $_POST['TeacherID'];
	$first_name = $_POST['FirstName'];
	$last_name = $_POST['LastName'];

	$update_sql = "UPDATE teachers SET FirstName = ?, LastName = ? WHERE TeacherID = ?";
	$stmt = $conn->prepare($update_sql);
	$stmt->bind_param("ssi", $first_name, $last_name, $teacher_id);

	if ($stmt->execute()) {
		echo "Teacher details updated successfully!";
		// Redirect back to the same page to show the updated data
		header("Location: edit_teacher.php?TeacherID=$teacher_id");
		exit;
	} else {
		echo "Error updating teacher: " . $stmt->error;
	}
}

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
				<font color="white">Edit Teacher</font>
			</h2>
			<a class="btn btn-primary" href="record.php"> <i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
			<hr>
			<div class="teacher">
				<form id="save_voter" class="form-horizontal" method="POST" action="update_teacher.php">
					<fieldset>

						<input type="hidden" name="TeacherID" value="<?php echo $teacher['TeacherID']; ?>">

						</br>
						<div class="new_voter_margin">
							<ul class="thumbnails_new_voter">
								<li class="span3">
									<div class="thumbnail_new_voter">
										<div class="confirmation" id="confirmation-message" style="display: none;">
											<i class="fas fa-check-circle"></i>
											<span>Teacher has been successfully updated.</span>
										</div>
										<div class="error" id="error-message" style="display: none;">
											<i class="fas fa-times-circle"></i>
											<span>Error: The teacher is already added.</span>
										</div>

										<div class="control-group">
											<label class="control-label" for="input01">First Name:</label>
											<div class="controls">
												<input type="text" name="FirstName" class="FirstName" id="span900"
													value="<?php echo $teacher['FirstName']; ?>">
											</div>
										</div>

										<div class=" control-group">
											<label class="control-label" for="input01">Last Name:</label>
											<div class="controls">
												<input type="text" name="LastName" class="LastName" id="span900"
													value="<?php echo htmlspecialchars($teacher['LastName']); ?>"
													required>
											</div>
										</div>




										<div class="control-group">

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
</div>
<script>
	$(document).ready(function () {
		// Handle the form submission via AJAX
		$('#save_voter').submit(function (event) {
			event.preventDefault(); // Prevent the default form submission

			// Get form data
			var formData = $(this).serialize();

			$.ajax({
				url: 'update_teacher.php', // The PHP file that handles the update operation
				type: 'POST',
				data: formData,
				dataType: 'json', // Expect a JSON response from the server
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

<?php include('footer.php'); ?>
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
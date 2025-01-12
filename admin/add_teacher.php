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
				<font color="white">Add Teachers</font>
			</h2>
			<a class="btn btn-primary" href="record.php"> <i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
			<hr>
			<div class="teacher">
				<form id="save_voter" class="form-horizontal" method="POST">
					<fieldset>
						</br>
						<div class="new_voter_margin">
							<ul class="thumbnails_new_voter">
								<li class="span3">
									<div class="thumbnail_new_voter">
										<!-- Confirmation and Error Messages -->
										<div class="confirmation" id="confirmation-message" style="display: none;">
											<i class="fas fa-check-circle"></i>
											<span>Teacher has been successfully added.</span>
										</div>
										<div class="error" id="error-message" style="display: none;">
											<i class="fas fa-times-circle"></i>
											<span>Error: The teacher is already added.</span>
										</div>

										<!-- First Name -->
										<div class="control-group">
											<label class="control-label" for="input01">First Name:</label>
											<div class="controls">
												<input class="item" type="text" name="first_naame" class="firstName"
													required>
											</div>
										</div>

										<!-- Last Name -->
										<div class="control-group">
											<label class="control-label" for="input01">Last Name:</label>
											<div class="controls">
												<input class="item" type="text" name="last_name" class="lastName"
													required>
											</div>
										</div>

										<!-- Save Button -->
										<div class="control-group">
											<div class="controls">
												<button id="save_voter_btn" class="btn btn-primary" type="submit"
													name="save">
													<i class="icon-save icon-large"></i>Save
												</button>
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
				url: 'save_teacher.php', // Update this URL to point to the server-side script
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

<?php include('footer.php'); ?>
</div>

</body>
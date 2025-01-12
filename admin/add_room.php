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
	<title>Select with Checkboxes</title>
	<link rel="stylesheet" href="addsched.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- Include Select2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<!-- jQuery (Make sure jQuery is included) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Include jQuery (required by Select2) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<div class="wrapper">
	<div id="element" class="hero-body-subject-add">
		<div class="nav-content">
			<h2>
				<font color="white">Add Room</font>
			</h2>
			<a class="btn btn-primary" href="room.php"> <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
			<hr>

			<!-- Floor Form -->
			<form id="save_floor" class="form-horizontal" method="POST" action="save_floor.php">
				<fieldset>
					</br>
					<div class="add_subject">
						<ul class="thumbnails_new_voter">
							<li class="span3">
								<div class="thumbnail_new_voter">
									<div class="confirmation" id="floor-confirmation-message" style="display: none;">
										<i class="fas fa-check-circle"></i>
										<span>Floor has been successfully added.</span>
									</div>
									<div class="error" id="floor-error-message" style="display: none;">
										<i class="fas fa-times-circle"></i>
										<span>Error: The selected floor is already added. Choose another floor.</span>
									</div>

									<div class="control-group">
										<label class="control-label" for="input01">Room Name:</label>
										<div class="controls">
											<input type="text" class="item" id="floor-number" name="floor_number"
												required />
										</div>
									</div>

									<div class="control-group">
										<div class="controls">
											<button id="save_floor_btn" class="btn btn-primary" name="save"><i
													class="icon-save icon-large"></i>Save</button>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</fieldset>
			</form>

			<!-- Room Form -->
			<form id="save_room" class="form-horizontal" method="POST" action="save_room.php">
				<fieldset>
					</br>
					<div class="add_subject">
						<ul class="thumbnails_new_voter">
							<li class="span3">
								<div class="thumbnail_new_voter">
									<div class="confirmation" id="room-confirmation-message" style="display: none;">
										<i class="fas fa-check-circle"></i>
										<span>Room has been successfully added.</span>
									</div>
									<div class="error" id="room-error-message" style="display: none;">
										<i class="fas fa-times-circle"></i>
										<span>Error: The selected room on this floor is already used. Choose
											another.</span>
									</div>

									<div class="control-group">
										<label class="control-label" for="input01">Floor:</label>
										<div class="controls">
											<select id="select-floor" class="item" name="floor_id" required>
												<option value="">Select Floor</option>
												<?php include_once('fetch_floor.php'); ?>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="input01">Room Name:</label>
										<div class="controls">
											<input type="text" name="room_name" class="item"
												data-source='["Room 301","Room 302","Room 303","Room 304","Room 305"]'
												data-items="4" data-provide="typeahead" style="margin: 0 auto;">
										</div>
									</div>

									<div class="control-group">
										<div class="controls">
											<button id="save_room_btn" class="btn btn-primary" name="save"><i
													class="icon-save icon-large"></i>Save</button>
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

<script>
	$(document).ready(function () {
		// Handle floor form submission
		$('#save_floor').on('submit', function (e) {
			e.preventDefault(); // Prevent page reload

			$.ajax({
				url: 'save_floor.php', // PHP script to save floor data
				type: 'POST',
				data: $(this).serialize(),
				success: function (response) {
					var result = JSON.parse(response); // Parse JSON response
					if (result.status === 'success') {
						showFloorConfirmationMessage(); // Show floor success message
					} else {
						showFloorErrorMessage(); // Show floor error message
					}
				},
				error: function () {
					showFloorErrorMessage(); // Show floor error message on failure
				}
			});
		});

		// Handle room form submission
		$('#save_room').on('submit', function (e) {
			e.preventDefault(); // Prevent page reload

			$.ajax({
				url: 'save_room.php', // PHP script to save room data
				type: 'POST',
				data: $(this).serialize(),
				success: function (response) {
					var result = JSON.parse(response); // Parse JSON response
					if (result.status === 'success') {
						showRoomConfirmationMessage(); // Show room success message
					} else {
						showRoomErrorMessage(); // Show room error message
					}
				},
				error: function () {
					showRoomErrorMessage(); // Show room error message on failure
				}
			});
		});
	});

	// Show floor confirmation message
	function showFloorConfirmationMessage() {
		document.getElementById("floor-confirmation-message").style.display = "block";
		document.getElementById("floor-error-message").style.display = "none";
	}

	// Show floor error message
	function showFloorErrorMessage() {
		document.getElementById("floor-error-message").style.display = "block";
		document.getElementById("floor-confirmation-message").style.display = "none";
	}

	// Show room confirmation message
	function showRoomConfirmationMessage() {
		document.getElementById("room-confirmation-message").style.display = "block";
		document.getElementById("room-error-message").style.display = "none";
	}

	// Show room error message
	function showRoomErrorMessage() {
		document.getElementById("room-error-message").style.display = "block";
		document.getElementById("room-confirmation-message").style.display = "none";
	}
</script>

<!-- Modal for Logout Confirmation -->
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

<script>
	// Trigger modal when logout link is clicked
	$('#logout-link').on('click', function () {
		$('#myModal').modal('show');
	});
</script>

</body>
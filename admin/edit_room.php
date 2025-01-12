<?php
include('./connection/session.php');
include('./components/header.php');
include('./connection/dbcon.php');
include('./components/nav-top1.php');
include('./components/main.php');

// Get room_id from URL to fetch the room details for editing
// Fetch room details based on room_id
$room_id = $_GET['id']; // replace with the desired room_id
$sql = "SELECT * FROM rooms WHERE room_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $room_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$room_name = $row["room_name"];
	$floor_id = $row["floor_id"];
} else {
	echo "No room found with ID: $room_id";
	$stmt->close();
	$conn->close();
	exit();
}

// Fetch floor options
$sql_floors = "SELECT * FROM floors";
$result_floors = $conn->query($sql_floors);
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
				<font color="white">Edit Room</font>
			</h2>
			<a class="btn btn-primary" href="room.php"> <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
			<hr>
			<form id="save_voter" class="form-horizontal" method="POST" action="update_room.php">
				<fieldset>
					</br>
					<div class="add_subject">
						<ul class="thumbnails_new_voter">
							<li class="span3">
								<div class="thumbnail_new_voter">
									<div class="confirmation" id="room-confirmation-message" style="display: none;">
										<i class="fas fa-check-circle"></i>
										<span>Room has been successfully updated.</span>
									</div>
									<div class="error" id="room-error-message" style="display: none;">
										<i class="fas fa-times-circle"></i>
										<span>Error: The selected room on this floor is already used. Choose
											another.</span>
									</div>
									<?php
									$result = mysqli_query($conn, "SELECT * FROM rooms WHERE room_id='$room_id'") or die(mysqli_error($conn));
									$row = mysqli_fetch_array($result);
									?>
									<input type="hidden" name="get_id" value="<?php echo $row['room_id']; ?>">

									<div class="control-group">
										<label class="control-label" for="input01">Room Name:</label>
										<div class="controls">
											<input type="text" class="item" id="room_name" name="room_name"
												value="<?php echo htmlspecialchars($room_name); ?>">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="input01">Floor:</label>
										<div class="controls">
											<select id="floor_id" name="floor_id" class="item">
												<?php
												if ($result_floors->num_rows > 0) {
													while ($floor = $result_floors->fetch_assoc()) {
														$selected = ($floor['floor_id'] == $floor_id) ? "selected" : "";
														echo "<option value='{$floor['floor_id']}' $selected>Floor {$floor['floor_number']}</option>";
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="control-group">
										<div class="controls">
											<button class="btn btn-primary" name="save"><i
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
		$('#save_voter').on('submit', function (e) {
			e.preventDefault(); // Prevent page reload

			// Perform AJAX request
			$.ajax({
				url: 'update_room.php', // The PHP script to save the schedule
				type: 'POST',
				data: $(this).serialize(), // Serialize form data
				success: function (response) {
					var result = JSON.parse(response); // Parse JSON response from server

					if (result.status === 'success') {
						showConfirmationMessage(); // Show success message
					} else {
						showErrorMessage(); // Show error message
					}
				},
				error: function () {
					showErrorMessage(); // Show error message on failure
				}
			});
		});
	});

	// Function to show the confirmation message
	function showConfirmationMessage() {
		document.getElementById("room-confirmation-message").style.display = "block";
		document.getElementById("room-error-message").style.display = "none";
	}

	// Function to show the error message
	function showErrorMessage() {
		document.getElementById("room-error-message").style.display = "block";
		document.getElementById("room-confirmation-message").style.display = "none";
	}

</script>
<?php include('footer.php'); ?>
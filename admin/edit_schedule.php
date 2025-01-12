<?php
include('./connection/session.php');
include('./components/header.php');
include('./connection/dbcon.php');
include('./components/nav-top1.php');
include('./components/main.php');

// Ensure the id is set
if (!isset($_GET['id'])) {
    echo "No schedule ID provided.";
    exit();
}

$id_get = $_GET['id'];

// Fetch the schedule details based on the schedule ID
$sql = "SELECT
    schedules.schedule_id,
    schedules.id AS teacher_id,  -- Fetch the teacher's ID from schedules
    floors.floor_number,
    schedules.room_id ,
    rooms.room_name,
    schedules.day_of_week,
    schedules.start_time,
    schedules.end_time,
    subjects.subject_code,
    teaching_faculty_information.first_name,
    teaching_faculty_information.last_name
FROM schedules
INNER JOIN floors ON schedules.floor_id = floors.floor_id
INNER JOIN rooms ON schedules.room_id = rooms.room_id
INNER JOIN subjects ON schedules.subject_id = subjects.subject_id
INNER JOIN teaching_faculty_information ON schedules.id = teaching_faculty_information.id
WHERE schedules.schedule_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_get);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No schedule found with ID: $id_get";
    $stmt->close();
    $conn->close();
    exit();
}

// Fetch available options for floors, teachers, subjects, and rooms
$sql_floors = "SELECT * FROM floors";
$result_floors = $conn->query($sql_floors);

$sql_rooms = "SELECT * FROM rooms";
$result_rooms = $conn->query($sql_rooms);

$sql_teachers = "SELECT * FROM teaching_faculty_information";
$result_teachers = $conn->query($sql_teachers);

$sql_subjects = "SELECT * FROM subjects";
$result_subjects = $conn->query($sql_subjects);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="addsched.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<div class="wrapper">
    <div id="element" class="hero-body">
        <h2>
            <font color="white">Edit Schedule</font>
        </h2>
        <a class="btn btn-primary" href="schedule.php">
            <i class="icon-arrow-left icon-large"></i>&nbsp;Back
        </a>
        <hr>

        <div class="edit_margin">
            <form id="save_voter" class="form-horizontal" method="POST"
                action="update_schedule.php?id=<?php echo $id_get; ?>">
                <!-- Success and Error Messages -->

                <fieldset>
                    <br>
                    <div class="add_subject">
                        <ul class="thumbnails_new_voter">
                            <li class="span3">
                                <div class="thumbnail_new_voter">
                                    <div class="confirmation" id="confirmation-message" style="display: none;">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Schedule has been successfully updated.</span>
                                    </div>
                                    <div class="error" id="error-message" style="display: none;">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Error: The selected room is already used. Choose another time slot.</span>
                                    </div>

                                    <input type="hidden" name="get_id" value="<?php echo $row['schedule_id']; ?>">

                                    <!-- Floor Dropdown -->
                                    <div class="control-group">
                                        <label class="control-label" for="input01">Floor:</label>
                                        <div class="controls">
                                            <select id="floor_id" name="floor_id">
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

                                    <!-- Room Dropdown -->
                                    <div class="control-group">
                                        <label class="control-label" for="room_id">Room Name:</label>
                                        <div class="controls">
                                            <select class="item" id="room_id" name="room_id" required>
                                                <option value="">Select Room</option>
                                                <?php
                                                if ($result_rooms->num_rows > 0) {
                                                    while ($room = $result_rooms->fetch_assoc()) {
                                                        $selected = ($room['room_id']) ? "selected" : "";
                                                        echo "<option value='{$room['room_id']}' $selected>{$room['room_name']}</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- JavaScript for Floor and Room AJAX -->
                                    <script>
                                        $(document).ready(function () {
                                            $('#floor_id').change(function () {
                                                var floor_id = $(this).val();
                                                $.ajax({
                                                    url: 'get_rooms.php',
                                                    type: 'POST',
                                                    data: { floor_id: floor_id },
                                                    success: function (response) {
                                                        $('#room_id').html(response);
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Day of the Week Selection -->
                                    <div class="control-group">
                                        <label class="control-label" for="schedule-day-input">Lecture Day:</label>
                                        <div class="controls">
                                            <select style="width: 75%;" id="schedule-day-input" name="day_of_week"
                                                required>
                                                <option value="">Select Lecture Day</option>
                                                <option value="Sunday" <?php echo ($row['day_of_week'] == 'Sunday') ? 'selected' : ''; ?>>Sunday</option>
                                                <option value="Monday" <?php echo ($row['day_of_week'] == 'Monday') ? 'selected' : ''; ?>>Monday</option>
                                                <option value="Tuesday" <?php echo ($row['day_of_week'] == 'Tuesday') ? 'selected' : ''; ?>>Tuesday</option>
                                                <option value="Wednesday" <?php echo ($row['day_of_week'] == 'Wednesday') ? 'selected' : ''; ?>>Wednesday</option>
                                                <option value="Thursday" <?php echo ($row['day_of_week'] == 'Thursday') ? 'selected' : ''; ?>>Thursday</option>
                                                <option value="Friday" <?php echo ($row['day_of_week'] == 'Friday') ? 'selected' : ''; ?>>Friday</option>
                                                <option value="Saturday" <?php echo ($row['day_of_week'] == 'Saturday') ? 'selected' : ''; ?>>Saturday</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Start and End Time -->
                                    <div class="control-group">
                                        <label class="control-label" for="start-time">Start Time:</label>
                                        <div class="controls">
                                            <input type="time" id="start-time" name="start_time"
                                                style="width: 75%; height: 2.5em;"
                                                value="<?php echo $row['start_time']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="end-time">End Time:</label>
                                        <div class="controls">
                                            <input type="time" name="end_time" style="width: 75%; height: 2.5em;"
                                                value="<?php echo $row['end_time']; ?>" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="subject">Subject:</label>
                                        <div class="controls">
                                            <select class="item" id="subject" name="subject" required>
                                                <?php
                                                if ($result_subjects->num_rows > 0) {
                                                    while ($subject = $result_subjects->fetch_assoc()) {
                                                        $selected = ($subject['subject_id'] == $subject_id) ? "selected" : "";
                                                        echo "<option value='{$subject['subject_id']}' $selected>{$subject['subject_code']}</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Teacher and Subject Dropdown -->
                                    <div class="control-group">
                                        <label class="control-label" for="teacher">Teacher:</label>
                                        <div class="controls">
                                            <select class="item" id="teacher" name="teacher" required>
                                                <option value="">Select Teacher</option>
                                                <?php while ($teacher = mysqli_fetch_assoc($result_teachers)): ?>
                                                    <option value="<?php echo $teacher['id']; ?>" <?php echo ($teacher['id'] == $row['teacher_id']) ? 'selected' : ''; ?>>
                                                        <?php echo $teacher['first_name'] . ' ' . $teacher['last_name']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>


                                    <!-- Save Button -->
                                    <div class="control-group">
                                        <div class="controls">
                                            <button id="save_voter" class="btn btn-primary" name="save">
                                                <i class="icon-save icon-large"></i> Save
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

<script>
    $(document).ready(function () {
        $('#save_voter').submit(function (event) {
            event.preventDefault(); // Prevent form from submitting the traditional way

            $.ajax({
                url: 'update_schedule.php?id=<?php echo $id_get; ?>',
                type: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function (response) {
                    if (response.status === 'success') {
                        $('#confirmation-message').show().find('span').text(response.message);
                        $('#error-message').hide();
                    } else {
                        $('#error-message').show().find('span').text(response.message);
                        $('#confirmation-message').hide();
                    }
                },
                error: function () {
                    $('#error-message').show().find('span').text('An unexpected error occurred.');
                    $('#confirmation-message').hide();
                }
            });
        });
    });
</script>

<?php
$stmt->close();
$conn->close();
include('footer.php');
?>
</div>
</body>
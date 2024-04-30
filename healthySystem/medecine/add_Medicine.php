<?php
include_once("./connection/connection.php");

// Initialize variables to hold medicine data if editing
$medicineId = "Auto";
$medicineName = "";
$description = "";
$timesPerDay = "";
$date = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $medicineId = $_GET['id'];
    // Fetch medicine data from the database
    $sql = "SELECT * FROM medecines WHERE id = $medicineId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $medicineName = $row['M_name'];
        $description = $row['M_description'];
        $timesPerDay = $row['times_A_day'];
        $date = $row['date'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Medicine' : 'Add New Medicine'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Medicines</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Medicine' : 'Add New Medicine'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="medicineForm" action="insert_medicine.php" method="POST">
        <div class="form-group">
            <label for="medicineId">Medicine ID:</label>
            <input type="text" id="medicineId" name="medicineId" class="form-control" value="<?php echo $medicineId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="medicineName">Medicine Name:</label>
            <input type="text" id="medicineName" name="medicineName" class="form-control" value="<?php echo $medicineName; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="timesPerDay">Times per Day:</label>
            <input type="number" id="timesPerDay" name="timesPerDay" class="form-control" value="<?php echo $timesPerDay; ?>">
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit"><?php echo isset($_GET['id']) ? 'Update' : 'Submit'; ?></button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("medicineForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var medicineName = document.getElementById("medicineName").value.trim();
        var description = document.getElementById("description").value.trim();
        var timesPerDay = document.getElementById("timesPerDay").value.trim();
        var date = document.getElementById("date").value.trim();

        // Validate medicine name
        if (medicineName === "") {
            isValid = false;
            // Handle validation error, e.g., display an error message
        }

        // Validate description (optional)

        // Validate times per day
        if (timesPerDay === "" || isNaN(timesPerDay)) {
            isValid = false;
            // Handle validation error
        }

        // Validate date
        if (date === "") {
            isValid = false;
            // Handle validation error
        }

        return isValid;
    }
</script>

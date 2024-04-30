<?php
include_once("./connection/connection.php");

// Fetch list of nurses
$sql = "SELECT * FROM users WHERE role = 'nurse'";
$nurses_result = $conn->query($sql);
?>

<div class="page">
    <div class="left">
        <h1>Add Appointment</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Add Appointment</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
</div>

<div id="loading" style="display: block;">
    <img src="allImages/loading.gif" alt="Loading..." style="width: 200px; height: 200px;">
</div>

<div id="addAppointmentForm" style="display: none;">
    <form action="createAppointment.php" method="POST" onsubmit="return validateForm()">
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" value="<?php echo $_SESSION['id']; ?>" readonly><br><br>
        
        <label for="doctorId">Doctor (Nurse) ID:</label>
        <select id="doctorId" name="doctorId" required>
            <option value="">Select Nurse</option>
            <?php
            if ($nurses_result->num_rows > 0) {
                while ($row = $nurses_result->fetch_assoc()) {
                    echo "<option value='".$row["id"]."'>".$row["fullName"]."</option>";
                }
            } else {
                echo "<option value='' disabled>No nurses found</option>";
            }
            ?>
        </select><br><br>
        
        <label for="appointmentDate">Appointment Date:</label>
        <input type="date" id="appointmentDate" name="appointmentDate" required><br><br>
        
        <label for="branch">Branch:</label>
        <input type="text" id="branch" name="branch" required><br><br>
        
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required pattern="[0-9]+" title="Please enter only numbers"><br><br>
        
        <button type="submit">Submit</button>
    </form>
</div>

<style>
    .loader {
        width: 50px; /* Adjust width as needed */
        height: 50px; /* Adjust height as needed */
    }
    
    input:invalid {
        border: 1px solid red;
    }
</style>

<script>
    function validateForm() {
        var isValid = true;
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].hasAttribute("required") && inputs[i].value.trim() === "") {
                isValid = false;
                inputs[i].style.border = "1px solid red";
            }
        }
        return isValid;
    }
    
    // JavaScript to hide loading image and show the form after 3 seconds
    setTimeout(function() {
        var loadingDiv = document.getElementById('loading');
        var formDiv = document.getElementById('addAppointmentForm');
        if (loadingDiv && formDiv) {
            loadingDiv.style.display = 'none';
            formDiv.style.display = 'block';
        }
    }, 3000);
</script>

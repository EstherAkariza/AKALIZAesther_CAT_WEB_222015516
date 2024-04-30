<?php include_once("./connection/connection.php"); ?>

<div class="page">
    <div class="left">
        <h1>Appointments</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Appointments</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_Appointment" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Appointment</span>
    </a>
</div>

<div id="loading" style="display: block;">
    <img src="allImages/loadin.gif" alt="Loading..." style="width: 200px; height: 200px;">
</div>

<div id="appointmentTable" style="display: none;">
    <?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
        <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
    <?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
        <div id="successMessage" class="success-message">Record deleted successfully!</div>
    <?php endif; ?>

    <div class="DataTable">
        <div class="cardHeader">
            <h2>All Appointments</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User ID</td>
                    <td>Doctor ID</td>
                    <td>Appointment Date</td>
                    <td>Branch</td>
                    <td>Date Submitted</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                // Fetch data from the appointments table
                $sql = "SELECT * FROM appointments";
                $result = $conn->query($sql);
                $x = 0;

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["userId"]."</td>";
                        echo "<td>".$row["doctorId"]."</td>";
                        echo "<td>".$row["appointment_date"]."</td>";
                        echo "<td>".$row["branch"]."</td>";
                        echo "<td>".$row["datesubmitted"]."</td>";
                        echo "<td> <a href='delete.php?table=appointments&page=appointments&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .loader {
        width: 50px; /* Adjust width as needed */
        height: 50px; /* Adjust height as needed */
    }

    .success-message {
        opacity: 1;
        background-color: lightgreen;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
</style>

<script>
    // JavaScript to hide loading image and show the table after 3 seconds
    setTimeout(function() {
        var loadingDiv = document.getElementById('loading');
        var tableDiv = document.getElementById('appointmentTable');
        if (loadingDiv && tableDiv) {
            loadingDiv.style.display = 'none';
            tableDiv.style.display = 'block';
        }
    }, 3000);

    // JavaScript to hide success message after 3 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
    }, 3000);
</script>

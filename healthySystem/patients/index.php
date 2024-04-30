<?php include_once("./connection/connection.php"); ?>

<div class="page">
    <div class="left">
        <h1>Patients</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Patients</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_Patient" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Patient</span>
    </a>
</div>

<div id="loading" style="display: block;">
    <img src="allImages/loadin.gif" alt="Loading..." style="width: 200px; height: 200px;">
</div>

<div id="patientTable" style="display: none;">
    <?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
        <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
    <?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
        <div id="successMessage" class="success-message">Record deleted successfully!</div>
    <?php endif; ?>

    <div class="DataTable">
        <div class="cardHeader">
            <h2>All Patients</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Cnt</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>Age</td>
                    <td>Gender</td>
                    <td>Image</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                // Fetch data from the users table where role is patient
                $sql = "SELECT * FROM users WHERE role = 'patient'";
                $result = $conn->query($sql);
                $x = 0;

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $x++;
                        echo "<tr>";
                        echo "<td>".$x."</td>";
                        echo "<td>".$row["fullName"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["address"]."</td>";
                        echo "<td>".$row["phone"]."</td>";
                        echo "<td>".$row["age"]."</td>";
                        echo "<td>".$row["gender"]."</td>";
                        echo "<td><div class='image-container'><img src='".validate_image($row["image"])."' alt='Patient Image'></div></td>";
                        
                        // Display status with appropriate styling
                        if ($row["status"] == "non_active") {
                            echo "<td class='not-available'>Blocked</td>";
                            echo "<td><a href='delete.php?page=patients&table=users&status=block&id=".$row["id"]."' onclick='return confirm(\"You are going to block this user?\")'>Block</a> | <a href='./?page=add_Patient&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=users&page=patients&users&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                        } else {
                            echo "<td class='available'>Active</td>";
                            echo "<td><a href='delete.php?page=patients&table=users&status=block&id=".$row["id"]."' onclick='return confirm(\"You are going to block this user?\")'>Block</a> | <a href='./?page=add_Patient&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=users&page=patients&users&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>";
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

    .image-container img {
        border-radius: 50%;
        width: 50px; /* Adjust size as needed */
        height: 50px; /* Adjust size as needed */
    }

    .available {
        background-color: #28a745;
        color: #fff;
    }

    .not-available {
        background-color: #dc3545;
        color: #fff;
    }
</style>


<script>
    // JavaScript to hide loading image and show the table after 3 seconds
    setTimeout(function() {
        var loadingDiv = document.getElementById('loading');
        var tableDiv = document.getElementById('patientTable');
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

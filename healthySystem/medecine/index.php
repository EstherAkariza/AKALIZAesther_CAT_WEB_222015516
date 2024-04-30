<?php include_once("./connection/connection.php"); ?>

<div class="page">
    <div class="left">
        <h1>Medicines</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Medicines</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_Medicine" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Medicine</span>
    </a>
</div>

<div id="loading" style="display: block;">
    <img src="allImages/loadin.gif" alt="Loading..." style="width: 200px; height: 200px;">
</div>

<div id="medicineTable" style="display: none;">
    <?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
        <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
    <?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
        <div id="successMessage" class="success-message">Record deleted successfully!</div>
    <?php endif; ?>

    <div class="DataTable">
        <div class="cardHeader">
            <h2>All Medicines</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Cnt</td>
                    <td>Medicine Name</td>
                    <td>Description</td>
                    <td>Times a Day</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                // Fetch data from the medecines table
                $sql = "SELECT * FROM medecines";
                $result = $conn->query($sql);
                $x = 0;

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $x++;
                        echo "<tr>";
                        echo "<td>".$x."</td>";
                        echo "<td>".$row["M_name"]."</td>";
                        echo "<td>".$row["M_description"]."</td>";
                        echo "<td>".$row["times_A_day"]."</td>";
                        echo "<td>".$row["date"]."</td>";
                        echo "<td><a href='./?page=add_Medicine&id=".$row["id"]."'>Update</a> | <a href='delete.php?page=medicines&table=medecines&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
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
        var tableDiv = document.getElementById('medicineTable');
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

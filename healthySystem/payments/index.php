<?php
include_once("./connection/connection.php");

// Fetch list of payments
$sql = "SELECT * FROM payments";
$payments_result = $conn->query($sql);
?>

<div class="page">
    <div class="left">
        <h1>Payments</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Payments</a>
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

<div id="paymentTable" style="display: none;">
    <?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
        <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
    <?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
        <div id="successMessage" class="success-message">Record deleted successfully!</div>
    <?php endif; ?>

    <div class="DataTable">
        <div class="cardHeader">
            <h2>All Payments</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Cnt</td>
                    <td>User ID</td>
                    <td>Doctor ID</td>
                    <td>Amount</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $x = 0;
                if ($payments_result->num_rows > 0) {
                    // Output data of each row
                    while($row = $payments_result->fetch_assoc()) {
                        $x++;
                        echo "<tr>";
                        echo "<td>".$x."</td>";
                        echo "<td>".$row["userId"]."</td>";
                        echo "<td>".$row["doctorId"]."</td>";
                        echo "<td>".$row["amount"]."</td>";
                        echo "<td>".$row["date_"]."</td>";
                        echo "<td><a href='delete.php?page=payments&table=payments&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
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
        var tableDiv = document.getElementById('paymentTable');
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

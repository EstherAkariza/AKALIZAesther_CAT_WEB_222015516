<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $medicine_name = $_POST["medicineName"];
    $medicine_description = $_POST["description"];
    $times_a_day = $_POST["timesPerDay"];
    $date = $_POST["date"];

    // Check if ID is provided for updating
    if ($_POST['medicineId'] != 'Auto') {
        $id = $_POST['medicineId'];
        // Update data in the medecines table
        $sql = "UPDATE medecines SET M_name='$medicine_name', M_description='$medicine_description', times_A_day='$times_a_day', date='$date' WHERE id=$id";
    } else {
        // Insert data into the medecines table
        $sql = "INSERT INTO medecines (M_name, M_description, times_A_day, date) 
                VALUES ('$medicine_name', '$medicine_description', '$times_a_day', '$date')";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the medecines page
        if ($_POST['medicineId'] != 'Auto') {
            header('location:./?page=medecine&message=edit');
        } else {
            header('location:./?page=medecine&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>

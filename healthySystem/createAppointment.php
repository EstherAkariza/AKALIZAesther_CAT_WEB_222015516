<?php
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $userId = $_POST['userId'];
    $doctorId = $_POST['doctorId'];
    $appointmentDate = $_POST['appointmentDate'];
    $branch = $_POST['branch'];
    $amount=$_POST['amount'];
    // Insert appointment data into the database
    $sql = "INSERT INTO appointments (userId, doctorId, appointment_date, branch, datesubmitted,amount) VALUES ('$userId', '$doctorId', '$appointmentDate', '$branch', NOW(),'$amount')";
    $sql2 = "INSERT INTO payments (userId, doctorId,amount) VALUES ('$userId', '$doctorId','$amount')";

    if ($conn->query($sql) === TRUE &&$conn->query($sql2) === TRUE) {
        // Redirect back to the page with success message
        header("Location: ./?page=appointments&message=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

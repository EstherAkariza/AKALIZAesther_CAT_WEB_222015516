<?php
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve   ID and new password from the form
    $id = $_POST['id'];
    $new_password = $_POST['new_password'];

    // Update the password in the database
    $sql = "UPDATE users SET users = '$new_password' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('location:./?page=reset&message=edit');
    } else {
        echo "Error resetting password: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<?php
include_once("./connection/connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to hold form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']); // Encrypt password using md5()
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    // Handle image upload
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];

        // Check if uploaded file is an image
        $allowed_extensions = array("image/jpeg", "image/jpg", "image/png", "image/gif");
        if (in_array($image_type, $allowed_extensions)) {
            $image = uniqid() . "_" . $image_name; // Generate unique image name
            $destination = "allImages/" . $image;

            // Move uploaded file to destination
            if (move_uploaded_file($image_tmp, $destination)) {
                // Insert patient data into database
                $sql = "INSERT INTO users (fullName, email, address, phone, password, age, gender, image, status, role) VALUES ('$fullName', '$email', '$address', '$phone', '$password', '$age', '$gender', '$image', '$status', 'patient')";
                if ($conn->query($sql) === TRUE) {
                    // Redirect to manage patients page with success message
                    header("Location: ./?page=patients&message=insert");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Invalid file type. Please upload an image file (jpg, jpeg, png, gif).";
        }
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

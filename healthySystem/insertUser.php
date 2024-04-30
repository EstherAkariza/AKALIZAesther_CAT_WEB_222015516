<?php
// Database connection
include_once("./connection/connection.php");


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $password2 = $_POST["password"];
    $password = md5($password2);
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $role = $_POST["role"];

    // File upload
    $targetDirectory = "allImages/"; // 
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Move uploaded file to desired directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Insert data into database
                $sql = "INSERT INTO users (fullName, email, address, phone, password, age, gender, role, image)
                        VALUES ('$fullName', '$email', '$address', '$phone', '$password', '$age', '$gender', '$role', '$targetFile')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header("location: login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}

// Close connection
$conn->close();
?>

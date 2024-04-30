<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "healthysystem";
//$store_url = "http://localhost/phpinventory/";
// db connection
$conn = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($conn->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  //echo "Successfully connected";
}
// Check if studentId is set and not empty
function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="'.$url.'"</script>';
}
?><div class="cardBox">
    <?php
    require_once('Sections/homeCard.php');

    // Count total number of cars
    $users = "SELECT COUNT(*) AS users FROM users";
    $users = $conn->query($users);
    $users = $users->fetch_assoc();
    $users = $users['users'];

    // Count total number of available cars
    $appointments = "SELECT COUNT(*) AS appointments FROM appointments";
    $appointments = $conn->query($appointments);
    $appointments = $appointments->fetch_assoc();
    $appointments = $appointments['appointments'];

    // Calculate the number of non-available cars

    // Call the function with the calculated values
    generateCard($users, 'All Users');
    generateCard($appointments, 'All appointments');
     ?>
</div>

             <div class="details">
                 <?php include_once("Sections/BIGIMAGE.php"); ?>

              </div>
        </div>
    </div>
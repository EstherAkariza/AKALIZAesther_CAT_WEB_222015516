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
 
?>
<style>
.success-message {
    background-color: lightgreen;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}
</style>
<div class="recentOrders">
   <?php
    // Check if the session variables are set
    if (isset($_SESSION['role']) && isset($_SESSION['cust_fullName'])) {
        // Display the message with green background for 4 seconds
        echo '<div class="success-message" id="messagee">Hello, this is ' . $_SESSION['role'] . ' <b>' . $_SESSION['cust_fullName'] . '</b> page</div>';
    }
    ?>
    <img src="allImages/home.jpg" alt="Home Image">
</div>
<script>
    // JavaScript to hide success message after 4 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('messagee');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
    }, 4000);
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form action="insertUser.php" method="POST" enctype="multipart/form-data">
        <label for="fullName">Full Name:</label><br>
        <input type="text" id="fullName" name="fullName" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        
        <label for="role">Role:</label><br>
        <select id="role" name="role" required>
            <option value="patient">Patient</option>
            <option value="nurse">Nurse</option>
        </select><br><br>
        
        <label for="image">Profile Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>

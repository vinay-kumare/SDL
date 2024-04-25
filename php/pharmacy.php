<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Management System - Student Management</title>
</head>
<body>
    <h1>Student Management</h1>
    
    <?php
    $error = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $connection = mysqli_connect("localhost", "username", "password", "database_name");
        
        // Check if form fields are set
        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
            // Retrieve form data
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
            $address = mysqli_real_escape_string($connection, $_POST['address']);
            
            // Insert into database
            $query = "INSERT INTO students (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
            if(mysqli_query($connection, $query)) {
                echo "<p>Student added successfully!</p>";
            } else {
                $error = "Error: " . mysqli_error($connection);
            }
        } else {
            $error = "Form fields are not set";
        }
        
        mysqli_close($connection);
    }
    ?>

    <!-- Student Entry Form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4"></textarea><br><br>
        <input type="submit" name="submit" value="Add Student">
    </form>

    <?php
    // Display error if any
    if ($error) {
        echo "<p style='color: red;'>$error</p>";
    }

    // Display list of students
    $connection = mysqli_connect("localhost", "username", "password", "database_name");
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);
    
    echo "<h2>Current Students</h2>";
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>";
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";

    mysqli_close($connection);
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>


<!-- 
CREATE TABLE drugs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
); -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toll Tax Management System - Vehicle Registration</title>
</head>
<body>
    <h1>Vehicle Registration</h1>
    
    <?php
    $error = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connection = mysqli_connect("localhost", "root", "", "sdl");
        
        // Retrieve form data
        $vehicle_number = mysqli_real_escape_string($connection, $_POST['vehicle_number']);
        $owner_name = mysqli_real_escape_string($connection, $_POST['owner_name']);
        
        // Insert into database
        $query = "INSERT INTO vehicles (vehicle_number, owner_name) VALUES ('$vehicle_number', '$owner_name')";
        if(mysqli_query($connection, $query)) {
            echo "<p>Vehicle registered successfully!</p>";
        } else {
            $error = "Error: " . mysqli_error($connection);
        }
        
        mysqli_close($connection);
    }
    ?>

    <!-- Vehicle Registration Form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="vehicle_number">Vehicle Number:</label><br>
        <input type="text" id="vehicle_number" name="vehicle_number" required><br><br>
        <label for="owner_name">Owner Name:</label><br>
        <input type="text" id="owner_name" name="owner_name" required><br><br>
        <input type="submit" value="Register Vehicle">
    </form>

    <?php
    // Display error if any
    if ($error) {
        echo "<p style='color: red;'>$error</p>";
    }

    $connection = mysqli_connect("localhost", "root", "", "sdl");
    $query = "SELECT * FROM vehicles";
    $result = mysqli_query($connection, $query);
    
    echo "<h2>Registered Vehicles</h2>";
    echo "<table border='1'>
            <tr>
                <th>Vehicle Number</th>
                <th>Owner Name</th>
            </tr>";
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['vehicle_number'] . "</td>";
        echo "<td>" . $row['owner_name'] . "</td>";
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

<!-- CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_number VARCHAR(20) NOT NULL,
    owner_name VARCHAR(100) NOT NULL)
); -->

<?php

// Database connection
$servername = "localhost";
$username = "username"; // replace with your database username
$password = "password"; // replace with your database password
$dbname = "asset_manager"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to hold form data
$equipment_name = $equipment_description = "";
$errors = [];

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate equipment name
    if (empty($_POST['equipment_name'])) {
        $errors['equipment_name'] = "Equipment name is required";
    } else {
        $equipment_name = $_POST['equipment_name'];
    }
    
    // Validate equipment description
    if (empty($_POST['equipment_description'])) {
        $errors['equipment_description'] = "Equipment description is required";
    } else {
        $equipment_description = $_POST['equipment_description'];
    }
    
    // If no errors, proceed to insert
    if (count($errors) == 0) {
        $sql = "INSERT INTO equipment (name, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $equipment_name, $equipment_description);

        if ($stmt->execute()) {
            echo "New equipment added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Equipment</title>
</head>
<body>
    <h1>Add New Equipment</h1>
    <form method="POST" action="equipment_create.php">
        <label for="equipment_name">Equipment Name:</label><br>
        <input type="text" name="equipment_name" value="<?php echo $equipment_name; ?>">
        <span><?php echo isset($errors['equipment_name']) ? $errors['equipment_name'] : ''; ?></span><br>
        <label for="equipment_description">Equipment Description:</label><br>
        <textarea name="equipment_description"><?php echo $equipment_description; ?></textarea>
        <span><?php echo isset($errors['equipment_description']) ? $errors['equipment_description'] : ''; ?></span><br><br>
        <input type="submit" value="Add Equipment">
    </form>
</body>
</html>

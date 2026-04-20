<?php
// equipment_delete.php

// Include database connection
include 'db_connection.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get equipment ID from POST data
    $equipment_id = isset($_POST['equipment_id']) ? intval($_POST['equipment_id']) : 0;

    // Validate equipment ID
    if ($equipment_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid Equipment ID.']);
        exit;
    }

    // Prepare SQL query to delete equipment record
    $query = "DELETE FROM equipment WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $equipment_id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Record deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting record: ' . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
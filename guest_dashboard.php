<?php
// guest_dashboard.php

// Role-based access control to ensure only guests can access this page
session_start();

// Check if the user is logged in as a guest
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guest') {
    echo "Access denied. This page is for guest users only.";
    exit;
}

// Sample equipment list for view-only
$equipment_list = [
    ['id' => 1, 'name' => 'Projector', 'status' => 'Available'],
    ['id' => 2, 'name' => 'Whiteboard', 'status' => 'In Use'],
    ['id' => 3, 'name' => 'Laptop', 'status' => 'Available'],
    ['id' => 4, 'name' => 'Sound System', 'status' => 'Maintenance'],
];

// HTML to display the equipment list
echo "<h1>Equipment List</h1>";
if (count($equipment_list) > 0) {
    echo "<ul>";
    foreach ($equipment_list as $equipment) {
        echo "<li>" . htmlspecialchars($equipment['name']) . " - Status: " . htmlspecialchars($equipment['status']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No equipment available.</p>";
}
?>

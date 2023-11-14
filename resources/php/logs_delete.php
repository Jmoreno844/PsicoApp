<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Assuming you have a database connection established before this point
// Replace the following with your actual database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "psicoapp"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get entry_id from the query parameters
$entryId = isset($_GET['entry_id']) ? $_GET['entry_id'] : '';

// Check if the entry_id is provided
if ($entryId != '') {
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM diario WHERE id_entrada = ?");
    $stmt->bind_param("i", $entryId);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Entry deleted successfully";
    } else {
        echo "Error deleting entry: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid entry ID";
}

// Close the database connection
$conn->close();
?>

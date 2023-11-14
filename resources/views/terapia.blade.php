@extends('layout.main')
@section('terapia')
<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the user is authenticated
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];

    // Assume you have a database connection established before this point
    // Replace the following with your actual database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "psicoapp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the user has a subscription
    $subscriptionQuery = "SELECT * FROM mensualidades WHERE id_usuario = '$loggedInUserId'";
    $subscriptionResult = $conn->query($subscriptionQuery);

    if ($subscriptionResult->num_rows > 0) {
        // User has a subscription
        $subscriptionRow = $subscriptionResult->fetch_assoc();

        if ($subscriptionRow['id_psicologo'] === null) {
            // User has a subscription but no psychologist assigned
            include '../resources/views/opcion_buscar_psicologo.php';
        } else {
            // User has a subscription with a psychologist assigned
            include '../resources/views/messages.php';  // Include the file for existing plan
        }
    } else {
        // User doesn't have a subscription
        include '../resources/views/opcion_elegir_plan.php';  // Include the file for existing plan
    }

    // Close the database connection
    $conn->close();
} else {
    // User not authenticated
    include '../resources/views/mensaje_logeate.php';
}
?>
@endsection

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $selectedPlan = $_POST['selected-plan'];
    $cardNumber = $_POST['card-number'];
    $expiryDate = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];

    // For security reasons, do not store sensitive information in this example

    // Simulate processing and create a subscription record
    simulateSubscriptionCreation($selectedPlan);

    // Redirect to a confirmation page
    header("Location: ../../public/sucessfull");
    exit();
} else {
    // Redirect to an error page if accessed directly
    header("Location: error_page.php");
    exit();
}

function simulateSubscriptionCreation($selectedPlan) {
    // Perform necessary processing to create a subscription record in your database
    // For demonstration, we'll assume you have a database connection already established
    session_start();

// Check if the user is authenticated
    if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];


}   else {
    // User not authenticated
    echo "User not authenticated.";
}
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "psicoapp";

    // Create a connection
    $conn = new mysqli($server, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the user ID (replace this with your logic to retrieve the user ID)
    $userId = $loggedInUserId; // Replace with actual user ID retrieval logic

    // Calculate the expiration date based on the selected plan
    $currentDate = date('Y-m-d');
    $expirationDate = ($selectedPlan === 'monthly') ? date('Y-m-d', strtotime($currentDate . ' +1 month')) : date('Y-m-d', strtotime($currentDate . ' +1 year'));

    // Insert a record into the Mensualidades table
    $sql = "INSERT INTO Mensualidades (id_usuario, fecha_inicio, fecha_expiracion) VALUES ('$userId', '$currentDate', '$expirationDate')";

    if ($conn->query($sql) === TRUE) {
        // Record inserted successfully
        echo "Subscription record created successfully";
    } else {
        // Error inserting record
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

// Replace these variables with your actual database credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'psicoapp';

// Create a MySQLi connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve the values from the form
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

// Perform your login logic by checking the database
$query = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();  // Fetch the user data from the result
    $_SESSION['user_id'] = $user['id_usuario'];
    $_SESSION['username'] = $user['username'];
    $response = ["status" => "success", "message" => "Login successful"];
} else {
    // Unsuccessful login
    $response = ["status" => "failure", "message" => "Invalid credentials"];
}

// Close the database connection
$stmt->close();
$mysqli->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

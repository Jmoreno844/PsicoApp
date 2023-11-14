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
$first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

// Perform your login logic by checking the database
$query = "INSERT INTO `usuarios` (`id_usuario`, `username`, `nombres`, `apellidos`, `correo`, `password`, `tipo_usuario`)
VALUES (NULL, ? , ? , ? , ? , ? , 'usuario');";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sssss", $username,$first_name, $last_name, $email, $password);

if ($stmt->execute()) {

    $user_id = $mysqli->insert_id;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    header("Location: ../../public/account");
    exit();
} else {
    // Unsuccessful registration
    $response = ["status" => "failure", "message" => "Error during registration: " . $stmt->error];
}
// Close the database connection
$stmt->close();
$mysqli->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

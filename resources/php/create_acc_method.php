<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'psicoapp';

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$checkUsernameQuery = "SELECT * FROM usuarios WHERE username = ?";
$checkUsernameStmt = $mysqli->prepare($checkUsernameQuery);
$checkUsernameStmt->bind_param("s", $username);
$checkUsernameStmt->execute();
$checkUsernameResult = $checkUsernameStmt->get_result();

$checkEmailQuery = "SELECT * FROM usuarios WHERE correo = ?";
$checkEmailStmt = $mysqli->prepare($checkEmailQuery);
$checkEmailStmt->bind_param("s", $email);
$checkEmailStmt->execute();
$checkEmailResult = $checkEmailStmt->get_result();

if ($checkUsernameResult->num_rows > 0) {
    $response = ["status" => "failure", "message" => "El nombre de usuario ya está en uso. Por favor, elige otro."];
} elseif ($checkEmailResult->num_rows > 0) {
    $response = ["status" => "failure", "message" => "Este correo electrónico ya está registrado. Intenta con otro."];
} else {
    $query = "INSERT INTO `usuarios` (`id_usuario`, `username`, `nombres`, `apellidos`, `correo`, `password`, `tipo_usuario`)
    VALUES (NULL, ? , ? , ? , ? , ? , 'usuario');";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssss", $username, $first_name, $last_name, $email, $password);

    if ($stmt->execute()) {
        $user_id = $mysqli->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $response = ["status" => "success", "message" => "¡Registro exitoso! Bienvenido(a)."];
    } else {
        $response = ["status" => "failure", "message" => "Error durante el registro: " . $stmt->error];
    }

    $stmt->close();
}

$checkUsernameStmt->close();
$checkEmailStmt->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode($response);
?>

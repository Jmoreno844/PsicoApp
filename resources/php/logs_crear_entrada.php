<?php
// log_entry.php

// Check if the session is not started, then start it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is authenticated
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];

    // Assuming you have a database connection established before this point
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

    // Get form data
    $selectedOption = isset($_POST['selectedOption']) ? $_POST['selectedOption'] : '';
    $entryTitle = isset($_POST['entryTitle']) ? $_POST['entryTitle'] : '';
    $entryText = isset($_POST['entryText']) ? $_POST['entryText'] : '';
    echo $selectedOption;
    // Map selected option to emocion value
    $emocion = '';
    if ($selectedOption == 1) {
        $emocion = '../resources/images/happy.png';
    } elseif ($selectedOption == 2) {
        $emocion = '../resources/images/medium.png';
    } elseif ($selectedOption == 3) {
        $emocion = '../resources/images/angry.png';
    } elseif ($selectedOption == 4) {
        $emocion = '../resources/images/sad.png';
    }

    // Insert entry into the database
    $insertQuery = "INSERT INTO diario (id_usuario, emocion, titulo_entrada, texto) VALUES ('$loggedInUserId', '$emocion', '$entryTitle', '$entryText')";

    if ($conn->query($insertQuery) === TRUE) {
        // Entry successfully inserted
        // Redirect to another page
        header("Location: ../../public/logs");
        exit();
    } else {
        echo "Error inserting entry: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to login page if the user is not authenticated
    header("Location: login.php");
    exit();
}
?>

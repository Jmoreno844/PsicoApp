<?php
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the user is authenticated
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        // Fetch a random psychologist from the usuarios table
        $randomPsychologistQuery = "SELECT id_usuario FROM usuarios WHERE tipo_usuario = 'psicologo' ORDER BY RAND() LIMIT 1";
        $result = $conn->query($randomPsychologistQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $newPsychologistId = $row['id_usuario'];

            // Update the record in the mensualidad table with the new psychologist_id
            $updateQuery = "UPDATE mensualidades SET id_psicologo = $newPsychologistId WHERE id_usuario = $loggedInUserId";

            if ($conn->query($updateQuery) === TRUE) {
                header("Location: ../../public/terapia");
                exit(); // M
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "No psychologists found in the usuarios table.";
        }

        // Close the database connection
        $conn->close();
    } else {
        // Form not submitted, display the form
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Encontrar psicólogo</title>
            <!-- Add your CSS styles here -->
        </head>
        <body>
            <div>
                <form action="find_psychologist.php" method="post">
                    <button type="submit">Encontrar psicólogo</button>
                </form>
            </div>
        </body>
        </html>

        <?php
    }
} else {
    // User not authenticated
    echo "User not authenticated.";
}
?>

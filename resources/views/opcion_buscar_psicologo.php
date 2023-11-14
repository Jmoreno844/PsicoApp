<?php
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the user is authenticated
if (isset($_SESSION['user_id'])) {
    // Assuming you have a function to check if the user has a psychologist assigned

        // User doesn't have a psychologist assigned
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../resources/css/buscar_psicologo.css">
            <title>No tienes un psicólogo asignado</title>
            <!-- Add your CSS styles here -->
        </head>
        <body>
            <div>
                <p>No tienes un psicólogo asignado.</p>
                <form action="../resources/php/assign_psychologyst.php" method="post">
                    <button type="submit">Encontrar psicólogo</button>
                </form>
            </div>
        </body>
        </html>

        <?php
} else {
    // User not authenticated
    echo "User not authenticated.";
}


?>

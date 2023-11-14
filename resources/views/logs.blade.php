@extends('layout.main')
@section('logs')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .diary-header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        .add-entry-btn {
            font-size: 24px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .separator {
            border: 1px solid #ccc;
            margin: 10px 0;
        }

        .diary-entries-container {
            max-height: 400px; /* Set the maximum height for the scrollable container */
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 10px;
        }

        .diary-entries {
            /* Removed padding from this div */
        }

        .entry-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
        }

        .entry-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .date-time {
            font-size: 14px;
            color: #555;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .emotion {
            max-width: 40px;
            max-height: 40px;
        }

        .entry-title {
            font-size: 16px;
        }

        /* Add a style for the entry card link */
        .entry-link {
            text-decoration: none;
            color: #000;
            cursor: pointer;
        }

        .entry-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        // User is logged in, display the diary content

        echo '<div class="diary-header">';
        echo '<h1>Diario</h1>';
        echo '<button class="add-entry-btn" onclick="openOptions()">+</button>';
        echo '</div>';
        echo '<hr class="separator">';
        // Add a scrollable container for the entries
        echo '<div class="diary-entries-container">';
        echo '<div class="diary-entries">';

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

        // Get entries for the logged-in user
        $loggedInUserId = $_SESSION['user_id'];

        $sql = "SELECT * FROM diario WHERE id_usuario = $loggedInUserId";
        $result = $conn->query($sql);

        // Display entries
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Add a link around the entry card
                echo '<a class="entry-link" href="logs_details?entry_id=' . $row['id_entrada'] . '">';
                echo '<div class="entry-card">';
                echo '<div class="entry-info">';
                // Convert the date to a better-looking format using PHP date function
                $date = strtotime($row['date_time']); // Assuming your date field is named 'fecha'
                $formattedDate = date("M d, Y | h:i A", $date);
                echo '<div class="date-time">' . $formattedDate . '</div>';
                echo '<button class="delete-btn" onclick="deleteEntry(' . $row['id_entrada'] . ')">&#128465;</button>';
                echo '</div>';
                echo '<img class="emotion" src="' . $row['emocion'] . '" alt="defult">';
                echo '<div class="entry-title">' . $row['titulo_entrada'] . '</div>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo '<p>No entries found.</p>';
        }

        // Close the database connection
        $conn->close();

        echo '</div>';
        echo '</div>'; // Close the scrollable container
    } else {
        // User is not logged in, include a different PHP file
        include '../resources/views/mensaje_logeate.php';
    }
?>

<script>
    function openOptions() {
        // Redirect to another PHP file when the green button is clicked
        window.location.href = 'logs_imagen';
    }

    function deleteEntry(entryId) {
        if (confirm('Are you sure you want to delete this entry?')) {
            $.ajax({
                type: 'GET',
                url: '../resources/php/logs_delete.php?entry_id=' + entryId,
                success: function(data) {
                    // Reload the page after successful deletion
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting entry. Status:', status);
                }
            });
        }
    }
</script>
</body>
</html>
@endsection

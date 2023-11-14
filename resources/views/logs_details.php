<?php
// entry_details.php

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

// Get entry details based on the entry_id parameter
$entryId = $_GET['entry_id'];

$sql = "SELECT * FROM diario WHERE id_entrada = $entryId";
$result = $conn->query($sql);

// Check if the entry exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary Entry Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .entry-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            width: 90%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .emotion {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .entry-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .entry-title {
            font-size: 24px;
            font-weight: bold;
            margin-left: 20px;
        }

        .entry-text {
            font-size: 16px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        #goBackButton {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="entry-details">
    <div class="entry-info">
        <img class="emotion" src="<?php echo $row['emocion']; ?>" alt="Default">
        <div class="entry-title"><?php echo $row['titulo_entrada']; ?></div>
    </div>
    <div class="entry-text"><?php echo $row['texto']; ?></div>
    <button id="goBackButton" onclick="goBack()">Go Back</button>
</div>

<script>
    function goBack() {
        // Navigate back to the previous page
        window.history.back();
    }
</script>

</body>
</html>
<?php
} else {
    echo '<p>Entry not found.</p>';
}

// Close the database connection
$conn->close();
?>

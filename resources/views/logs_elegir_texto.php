<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Entry</title>
    <style>
       body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
    background-color: #f4f4f4;
}

.entry-form {
    padding: 20px;
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.entry-form h2 {
    color: #3498db;
}

.entry-input {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

#submitButton {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

#submitButton:hover {
    background-color: #2980b9;
}

/* Responsive styling */
@media only screen and (max-width: 600px) {
    .entry-form {
        width: 90%;
    }
}

    </style>
</head>
<body>

<div class="entry-form">
    <h2>crear nota</h2>

    <form action="../resources/php/logs_crear_entrada.php" method="post">
        <?php
        if (isset($_GET['selectedOption'])) {
            // Include a hidden input field to pass the selected option to the next page
            echo '<input type="hidden" name="selectedOption" value="' . htmlspecialchars($_GET['selectedOption']) . '">';
        }
        ?>

        <label for="entryTitle">Titulo:</label>
        <input type="text" id="entryTitle" name="entryTitle" class="entry-input" required>

        <label for="entryText">Texto:</label>
        <textarea id="entryText" name="entryText" class="entry-input" rows="4" required></textarea>

        <button type="submit" id="submitButton">Subir</button>
    </form>
</div>

</body>
</html>

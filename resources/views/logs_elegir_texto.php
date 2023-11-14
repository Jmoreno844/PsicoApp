<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .entry-form {
            padding: 20px;
        }

        .entry-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #submitButton {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="entry-form">
    <h2>Log Entry</h2>

    <form action="../resources/php/logs_crear_entrada.php" method="post">
        <?php
        if (isset($_GET['selectedOption'])) {
            // Include a hidden input field to pass the selected option to the next page
            echo '<input type="hidden" name="selectedOption" value="' . htmlspecialchars($_GET['selectedOption']) . '">';
        }
        ?>

        <label for="entryTitle">Title:</label>
        <input type="text" id="entryTitle" name="entryTitle" class="entry-input" required>

        <label for="entryText">Text:</label>
        <textarea id="entryText" name="entryText" class="entry-input" rows="4" required></textarea>

        <button type="submit" id="submitButton">Upload Entry</button>
    </form>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .options-container {
            padding: 20px;
        }

        .image-button {
            width: 30%; /* Make the image button take up the full width */
            max-width: 200px; /* Set a maximum width */
            height: 20vh; /* Set a specific height as a percentage of the viewport height */
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            overflow: hidden; /* Ensure the image won't exceed the specified height */
            transition: transform 0.2s;
        }

        .image-button img {
            width: 100%; /* Make the image inside the button take up the full width */
            height: auto; /* Maintain the aspect ratio */
            border-radius: 5px; /* Apply border-radius to the image */
        }

        .image-button:hover {
            transform: scale(1.1);
        }

        #nextButton {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="options-container">
    <h2>Select an option:</h2>

    <button class="image-button" onclick="selectOption(1)">
        <img src="../resources/images/happy.png" alt="Option 1">
    </button>

    <button class="image-button" onclick="selectOption(2)">
        <img src="../resources/images/medium.png" alt="Option 2">
    </button>

    <button class="image-button" onclick="selectOption(3)">
        <img src="../resources/images/angry.png" alt="Option 3">
    </button>

    <button class="image-button" onclick="selectOption(4)">
        <img src="../resources/images/sad.png" alt="Option 4">
    </button>

    <button id="nextButton" onclick="goToNextPage()">Next</button>
</div>

<script>
    var selectedOption; // Declare selectedOption as a global variable

    function selectOption(optionNumber) {
        // Set the global variable selectedOption
        selectedOption = optionNumber;
        console.log('Option selected:', selectedOption);
    }

    function goToNextPage() {
        // Now selectedOption is accessible here
        window.location.href = 'logs_texto?selectedOption=' + selectedOption;
    }
</script>

</body>
</html>

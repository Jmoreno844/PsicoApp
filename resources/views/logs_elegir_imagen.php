<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options Page</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
    background-color: #f4f4f4;
}

.options-container {
    padding: 20px;
    max-width: 300px;
    margin: 50px auto;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #3498db;
    margin-bottom: 20px;
}

.image-button {
    width: 100%;
    height: auto;
    margin: 10px 0;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    overflow: hidden;
    transition: transform 0.2s;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.image-button img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    object-fit: cover; /* Ajuste para cubrir el contenedor manteniendo la relación de aspecto */
    max-height: 150px; /* Altura máxima para las imágenes */
}

.image-button:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

#nextButton {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 20px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

#nextButton:hover {
    background-color: #2980b9;
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

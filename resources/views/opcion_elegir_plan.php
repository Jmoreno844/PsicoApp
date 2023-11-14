
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes iFeel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .plan-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .plan-header {
            color: #3498db;
            margin-bottom: 10px;
        }

        .plan-price {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .plan-list {
            text-align: left;
            margin-bottom: 20px;
        }

        .plan-list-item {
            list-style-type: none;
            margin-bottom: 5px;
        }

        .select-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .select-button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .select-button:hover {
            background-color: #3498db;
            color: #fff;
        }

        .selected-button {
            background-color: #3498db;
            color: #fff;
        }

        .choose-plan-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .choose-plan-button:hover {
            background-color: #2980b9;
        }

        .plan-list-item::before {
            content: '\2022'; /* Código Unicode para un punto negro */
            margin-right: 5px;
        }

        .footer {
    display: flex;
    justify-content: space-between;
    background-color: #fff;
    padding: 10px;
    position: fixed;
    bottom: 0;
    left: 0; /* Ensure the footer starts from the left */
    width: 100%;
}

        .footer-option {
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            height: 100px; /* Fixed height for consistent alignment */
        }

        .footer-option a {
            color: #333; /* Link color */
            text-decoration: none; /* Remove underline */
        }

        .footer-option a:hover {
            color: #0078FF; /* Link color on hover */
        }

        .footer-option i {
            font-size: 24px;
        }

        .footer-text {
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="plan-container">
    <h1 class="plan-header">Elige tu plan</h1>
    <p class="plan-price">$9.99/mes</p>

    <ul class="plan-list">
    <li class="plan-list-item">Terapeuta privado</li>
    <li class="plan-list-item">Mensajes ilimitados</li>
    <li class="plan-list-item">Respuestas diarias</li>
</ul>

    <div class="select-buttons">
        <button class="select-button" onclick="selectButton('monthly')" data-plan="monthly">Mensual</button>
        <button class="select-button selected-button" onclick="selectButton('annual')" data-plan="annual">Anual</button>
    </div>

    <button class="choose-plan-button" onclick="choosePlan()">Elegir plan</button>
</div>

<!-- Add this script to open a new popup window -->
<script>
    function selectButton(selected) {
        document.querySelectorAll('.select-button').forEach(item => {
            item.classList.remove('selected-button');
        });

        document.querySelector(`.select-button[data-plan="${selected}"]`).classList.add('selected-button');
    }

    function choosePlan() {
        const selectedButton = document.querySelector('.selected-button');
        const selectedPlan = selectedButton ? selectedButton.getAttribute('data-plan') : '';

        // Open a new popup window with the selected plan
        openPopup(selectedPlan);
    }

    function openPopup(selectedPlan) {
        // Create a random string as a unique identifier for the popup
        const popupId = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

        // Create the URL for the popup page with the selected plan
        const popupUrl = `popup_page?selectedPlan=${encodeURIComponent(selectedPlan)}&popupId=${popupId}`;

        // Open the popup window
        const popupWindow = window.open(popupUrl, 'PaymentPopup', 'width=400,height=400');

        // Focus on the popup window
        if (popupWindow) {
            popupWindow.focus();
        }
    }
</script>


</body>

</html>

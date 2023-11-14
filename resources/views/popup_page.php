<!-- popup_page.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #3498db;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-top: 10px;
            color: #333;
        }

        input {
            padding: 8px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 50%;
            margin-top: 15px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h2>Enter Your Credit Card Information</h2>

    <!-- Include the form for entering credit card information -->
    <form action="../resources/php/create_subscription.php" method="post">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" required>

        <label for="expiry-date">Expiry Date:</label>
        <input type="text" id="expiry-date" name="expiry-date" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <!-- Hidden input to store the selected plan -->
        <input type="hidden" id="selected-plan" name="selected-plan" value="<?php echo htmlspecialchars($_GET['selectedPlan']); ?>">

        <button type="submit">Submit Payment</button>
    </form>

    <!-- JavaScript to close the popup after submission -->
    <script>
        function closePopup() {
            window.close();
        }
    </script>
</body>
</html>

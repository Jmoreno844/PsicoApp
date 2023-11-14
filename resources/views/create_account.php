<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      max-width: 400px;
      background-color: #fff;
      padding: 20px;
      width: 80%;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .login-button, .create-account-button {
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      text-decoration: none; /* Remove default anchor underline */
      margin: 10px;
    }

    .login-button:hover, .create-account-button:hover {
      background-color: #0056b3;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <form action="../resources/php/create_acc_method.php" method="post" onsubmit="submitForm()">


      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required style="width: 90%;">

      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required style="width: 90%;">

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required style="width: 90%;">

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" placeholder="Enter your email" required style="width: 90%;">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required style="width: 90%;">

      <button type="submit" class="create-account-button">Create Account</button>
    </form>
    <p style="text-align: center; margin-top: 10px;">Already have an account? <a href="login">Log in here</a></p>
  </div>

  <script>
function submitForm() {
    // Collect form data
    var formData = $("form").serialize(); // Use the correct form ID or tag

    // Send AJAX request
    $.ajax({
        type: "POST",
        url: "../resources/php/create_acc_method.php",
        data: formData,
        dataType: "json", // Expecting JSON response
        success: function(response) {
            // Handle the response
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the AJAX request error
        }
    });
}

</script>
</body>
</html>

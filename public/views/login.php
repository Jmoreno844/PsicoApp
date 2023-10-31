<!DOCTYPE html>
<html>
<head>
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
      width:80%;
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
    <h2>Login</h2>
    <form action="your-login-action" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" placeholder="Enter your username" required style="width: 90%;">

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" placeholder="Enter your password" required style="width: 90%;">

  <button type="submit" class="login-button">Login</button>
</form>
<form action="your-create-account-action" method="post">
  <button type="submit" class="create-account-button">Create Account</button>
</form>
  </div>
</body>

</html>

@extends('layout.main')
@section('account')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 80%;
            max-width: 400px;
        }

        h1 {
            font-size: 24px;
        }

        .login-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none; /* Remove default anchor underline */
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .account-hud {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-image {
            width: 100px; /* Adjust the size of the profile image */
            height: 100px; /* Adjust the size of the profile image */
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .account-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .account-buttons {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .account-button {
            background-color: #f0f0f0; /* Adjust the button styles as needed */
            border: 1px solid #ddd; /* Adjust the button styles as needed */
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .account-button img {
            width: 24px; /* Adjust the size of the button image */
            height: 24px; /* Adjust the size of the button image */
            margin-right: 10px;
        }
        .account-button:hover {
            background-color: #f0f0f0; /* Cambia el color al pasar el ratón */
        }

        .login-button {
            /* ... Otros estilos ... */
            text-decoration: none; /* Elimina el subrayado predeterminado */
            color: #fff; /* Cambia el color del texto a blanco */
        }

        .login-button:hover {
            background-color: #0056b3; /* Cambia el color al pasar el ratón */
        }
    </style>
</head>
<body>
    <?php
        session_start();

        if (isset($_SESSION['user_id'])) {
            include base_path('resources/php/functions.php');

            $fullname = fetchUserName($_SESSION['user_id']);
    // User is logged in, show account HUD
    echo '<div class="container account-hud">';
    // Add the user's profile image (replace "profile-image.jpg" with the actual path)
    echo '<img class="profile-image" src="../resources/images/icono_perfil.png" alt="Profile Image">';
    // Add the user's account name
    echo '<div class="account-name">'.$fullname.'</div>';
    // Add account buttons
    echo '<div class="account-buttons">';
    // Example buttons, add your own as needed

    // Logout button
    echo '<div class="account-button" onclick="logout()"><img src="../resources/images/icon3.png" alt="Icon 3"> Cerrar sesion</div>';
    echo '</div>';
    echo '</div>';
} else {
    // User is not logged in, show login link
    echo '<div class="container">';
    echo '<h1>Welcome to Your App</h1>';
    echo '<p>Please log in to your account.</p>';
    echo '<a href="login" class="login-button">Login</a>';
    echo '</div>';
}
?>

<script>
    function logout() {
        // AJAX request to logout.php
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page after successful logout
                location.reload();
            }
        };
        xhr.open("GET", '../resources/php/logout.php', true);
        xhr.send();
    }
</script>
</body>
</html>
@endsection

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .chat-list {
            background-color: #fff;
            padding: 10px;
        }

        .chat {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background-color: #0078FF;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            flex: 1;
        }

        h3 {
            font-size: 18px;
            margin: 0;
        }

        p {
            font-size: 14px;
            color: #777;
            margin: 0;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
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

    <div class="chat-list">
        <div class="chat">
            <a href="chat1.html">
                <div class="user-avatar"></div>
                <div class="user-info">
                    <h3>User 1</h3>
                    <p>Last message...</p>
                </div>
            </a>
        </div>

        @yield('chats_list')

        <div class="chat">
            <a href="chat2.html">
                <div class="user-avatar"></div>
                <div class="user-info">
                    <h3>User 2</h3>
                    <p>Last message...</p>
                </div>
            </a>
        </div>

        <!-- Add more chat elements here -->
    </div>
    <footer>
    <div class="footer">
        <div class="footer-option">
            <a href="main.php">
            <i class="fas fa-home"></i>
            <p class="footer-text">Inicio</p>
        </div>
        <div class="footer-option">
            <a href="/PsicoApp/resources/views/main.blade.php" >
            <i class="fas fa-search"></i>
            <p class="footer-text">Psicologos</p>
        </div>
        <div class="footer-option">
            <a href="/views/php/login_method.php">
            <i class="fas fa-comment"></i>
            <p class="footer-text">Chats</p>
        </div>
        <div class="footer-option">
            <a href="../views/logs.php">
            <i class="fas fa-calendar"></i>
            <p class="footer-text">Notas</p>
        </div>
        <div class="footer-option">
            <a href="../views/account.php">
            <i class="fas fa-user"></i>
            <p class="footer-text">Cuenta</p>
        </div>
    </div>
</footer>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style> /* style footer */
        a {
            text-decoration: none;
            color: inherit;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .article {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
        }

        .article-title {
            font-size: 18px;
            font-weight: bold;
        }

        .article-image {
            max-width: 100%;
            height: auto;
        }

        .article-text {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="article">
        <a class="article-title" href="#">Título del Artículo 1</a>
        <img class="article-image" src="imagen1.jpg" alt="Imagen del Artículo 1">
        <p class="article-text">Este es un artículo de ejemplo. Aquí puedes agregar una breve descripción del artículo o contenido relevante.</p>
    </div>

    <div class="article">
        <a class="article-title" href="#">Título del Artículo 2</a>
        <img class="article-image" src="imagen2.jpg" alt="Imagen del Artículo 2">
        <p class="article-text">Este es otro artículo de ejemplo. Puedes continuar agregando más artículos siguiendo la misma estructura.</p>
    </div>

    <!-- Agrega más artículos aquí siguiendo el mismo formato -->

</body>
<footer>
    <div class="footer">
        <div class="footer-option">
            <a href="main.php">
            <i class="fas fa-home"></i>
            <p class="footer-text">Inicio</p>
        </div>
        <div class="footer-option">
            <a href="../psicologos" >
            <i class="fas fa-search"></i>
            <p class="footer-text">Psicologos</p>
        </div>
        <div class="footer-option">
            <a href="views/chats.php">
            <i class="fas fa-comment"></i>
            <p class="footer-text">Chats</p>
        </div>
        <div class="footer-option">
            <a href="views/logs.php">
            <i class="fas fa-calendar"></i>
            <p class="footer-text">Notas</p>
        </div>
        <div class="footer-option">
            <a href="views/account.php">
            <i class="fas fa-user"></i>
            <p class="footer-text">Cuenta</p>
        </div>
    </div>
</footer>
</html>

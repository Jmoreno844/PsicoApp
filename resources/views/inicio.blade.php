@extends('layout.main')
@section('inicio')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* style footer */
        a {
            text-decoration: none;
            color: inherit;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4; /* Set background color */
        }

        .article {
            max-width: 600px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
            background-color: #fff; /* Set background color for articles */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center text within articles */
        }

        .article img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .largeArticleContainer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .largeArticleContent {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
        }

        .hidden {
            display: none; /* Hide the largeArticleContainer by default */
        }
    </style>
    <link rel="stylesheet" href="../resources/css/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="article">
        <a class="article-title" href="articulo1">Ansiedad: Entendiendo la Ansiedad</a>
        <img class="article-image" src="../resources/images/ansiedad.jpg" alt="Imagen del Artículo 1">
        <p class="article-text">La ansiedad es una respuesta natural del cuerpo frente a situaciones de estrés. Este artículo explora los síntomas, causas y estrategias para gestionar la ansiedad en la vida cotidiana.</p>
    </div>

    <div class="article">
        <a class="article-title" href="articulo2">Depresión: Comprendiendo la Depresión</a>
        <img class="article-image" src="../resources/images/depresion.jpg" alt="Imagen del Artículo 2">
        <p class="article-text">La depresión es más que simplemente sentirse triste. Descubre cómo afecta la depresión a la mente y el cuerpo, así como las opciones de tratamiento disponibles para aquellos que la experimentan.</p>
    </div>

    <div class="article">
        <a class="article-title" href="articulo3">Esquizofrenia: Desmitificando la Esquizofrenia</a>
        <img class="article-image" src="../resources/images/imagen2.jpg" alt="Imagen sobre esquizofrenia">
        <p class="article-text">La esquizofrenia es un trastorno mental complejo. Este artículo proporciona información sobre los síntomas, el diagnóstico y las opciones de tratamiento disponibles para aquellos que viven con esta condición.</p>
    </div>

    <!-- Add more articles here with corresponding PHP pages -->

    <div class="largeArticleContainer hidden" onclick="hideArticle(this)">
        <div class="largeArticleContent" id="largeArticleContent"></div>
    </div>

    <script>
        function showArticle(article) {
            var title = article.querySelector('.article-title').innerText;
            var imageSrc = article.querySelector('.article-image').src;
            var text = article.querySelector('.article-text').innerText;

            var largeArticleContent = document.getElementById('largeArticleContent');
            largeArticleContent.innerHTML = `
                <h2>${title}</h2>
                <img src="${imageSrc}" alt="${title}">
                <p>${text}</p>
            `;

            var largeArticleContainer = document.querySelector('.largeArticleContainer');
            largeArticleContainer.classList.remove('hidden');
        }

        function hideArticle(container) {
            container.classList.add('hidden');
        }
    </script>
</body>
</html>
@endsection

@extends('layout.main')
@section('inicio')
<!DOCTYPE html>
<html lang="es">
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
    </style>
    <link rel="stylesheet" href="../resources/css/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="article" onclick="showArticle(this)">
        <a class="article-title" href="{{ route('article.show', ['id' => 1]) }}">Título del Artículo 1</a>
        <img class="article-image" src="../resources/images/imagen2.jpg"alt="Imagen del Artículo 1">
        <p class="article-text">Este es un artículo de ejemplo. Aquí puedes agregar una breve descripción del artículo o contenido relevante.</p>
    </div>

    <div class="article" onclick="showArticle(this)">
        <a class="article-title" href="{{ route('article.show', ['id' => 2]) }}">Título del Artículo 2</a>
        <img class="article-image" src="../resources/images/imagen2.jpg" alt="Imagen del Artículo 2">
        <p class="article-text">Este es otro artículo de ejemplo. Puedes continuar agregando más artículos siguiendo la misma estructura.</p>
    </div>

    <div class="article" onclick="showArticle(this)">
        <a class="article-title" href="{{ route('article.show', ['id' => 3]) }}">Esquizofrenia</a>
        <img class="article-image" src="../resources/images/imagen2.jpg" alt="Imagen sobre esquizofrenia">
        <p class="article-text">La esquizofrenia es una enfermedad mental grave que afecta la forma en que una persona piensa, siente y se comporta.</p>
    </div>

    <!-- Agrega más artículos aquí siguiendo el mismo formato -->

    <!-- Contenedor para mostrar el artículo en grande -->
    <div id="largeArticleContainer" class="hidden" onclick="hideArticle(this)">
        <div id="largeArticleContent"></div>
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

            var largeArticleContainer = document.getElementById('largeArticleContainer');
            largeArticleContainer.classList.remove('hidden');
        }

        function hideArticle(container) {
            container.classList.add('hidden');
        }
    </script>
</body>
</html>
@endsection


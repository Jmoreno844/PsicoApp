<!-- show.blade.php -->

@extends('layout.main')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ... (tu código actual) -->
</head>
<body>
    <div class="article">
        <h2>{{ $article['title'] }}</h2>
        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}">
        <p>{{ $article['text'] }}</p>
    </div>

    <!-- ... (tu código actual) -->
</body>
</html>
@endsection

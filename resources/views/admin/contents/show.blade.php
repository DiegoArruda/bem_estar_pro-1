<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Vídeo</title>
</head>
<body>
    <h1>{{ $content->title }}</h1>
    <p>Link armazenado: {{ $content->link }}</p>
    <p>Debug: {{ $content->link }}</p>

    <!-- Exibir o vídeo do YouTube -->
    @if($videoId)
        <iframe width="560" height="315" 
            src="https://www.youtube.com/embed/{{ $videoId }}" 
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    @else
        <p>Link de vídeo inválido.</p>
    @endif
</body>
</html>
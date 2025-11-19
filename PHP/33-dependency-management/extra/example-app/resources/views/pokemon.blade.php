<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{$pokemon->name}}</h1>
    <img src="{{ $pokemon->getImgUrl() }}" alt="{{ $pokemon->name }}">
    <a href="/" style="display:block">Go back home</a>
</body>

</html>
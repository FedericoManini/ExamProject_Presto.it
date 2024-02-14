<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <p>Vuoi renderlo revisore?</p>
    <a href="{{route('make.revisor', compact('user'))}}">Rendi Revisor</a>
</body>
</html>
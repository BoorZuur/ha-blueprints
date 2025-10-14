<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Blueprint Details</h1>
    <p>ID: {{ $blueprint->id }}</p>
    <p>Name: {{ $blueprint->name }}</p>
    <p>Description: {{ $blueprint->description }}</p>
    <p>code: <code>{{ $blueprint->blueprint }}</code></p>
    <a href="{{ route('blueprints.index') }}">Back to list</a>
</body>
</html>

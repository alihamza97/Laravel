<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WikiCars</title>
</head>
<body>
<img src="images/cars/{{ $wikiCars->carImage }}" alt="" class="">
<h1>{{$wikiCars->carTitle}}</h1>
<p>{{ $wikiCars->description }}</p>
</body>
</html>
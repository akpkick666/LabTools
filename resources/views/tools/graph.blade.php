<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>KurodaLab</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>RESULT</h1>
        <div>
            <h2 class='title'>{{ $graph_name }}</h2>
            <img src="{{ asset('img/cd_graph/' . $graph_name . '.png')}}" alt="">
        </div>
    </body>
</html>

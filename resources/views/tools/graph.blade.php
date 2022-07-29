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
            <h2 class='title'>フォルダ名:  . {{ $data_dir }}</h2>
            <img src="{{ asset('img/cd/' . $data_dir . '/graph_data.png')}}" alt="">
        </div>
    </body>
</html>

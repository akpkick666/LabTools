<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>KurodaLab</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>RESULT</h1>
            <div>
                <h2 class='title'>フォルダ名:  . {{ $data_dir }}</h2>
                <img src="{{ asset('img/cd/' . $data_dir . '/graph_data.png')}}" alt="">
                <img src="{{ asset('img/cd/' . $data_dir . '/sample_metadata.png')}}" alt="" class="w-25">
            </div>
        </div>
    </body>
</html>

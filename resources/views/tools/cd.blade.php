<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>KurodaLab</title>
    </head>
    <body>
        <h1>Circular Dichroism</h1>
        <form action="/cdpython" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>sample</h2>
                <input type="file" name="sample"/>
            </div>
            <div class="title">
                <h2>blank</h2>
                <input type="file" name="blank"/>
            </div>
            <input type="submit" value="EXECUTE"/>
        </form>
    </body>
</html>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>KurodaLab</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/python" method="POST">
            @csrf
            <div class="title">
                <h2>sample</h2>
                <input type="file" name="set[sample]"/>
            </div>
            <div class="title">
                <h2>blank</h2>
                <input type="file" name="set[blank]"/>
            </div>
            <input type="submit" value="EXECUTE"/>
        </form>
    </body>
</html>
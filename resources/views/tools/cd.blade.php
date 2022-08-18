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
                <input type="file" name="file[sample]"/>
                <p class="title__error" style="color:red">{{ $errors->first('file.sample') }}</p>
                <input type="file" name="file[sample2]"/>
                <input type="file" name="file[sample3]"/>
            </div>
            <div class="title">
                <h2>blank</h2>
                <input type="file" name="file[blank]"/>
                <p class="title__error" style="color:red">{{ $errors->first('file.blank') }}</p>
            </div>
            <div class="title">
                <h2>X-axis</h2>
                <div>
                    <h4>max</h4>
                    <input type="number" value="260" step="0.1" name="axis[x-max]"/>
                </div>
                <div>
                    <h4>min</h4>
                    <input type="number" value="200" step="0.1" name="axis[x-min]"/>
                </div>
                <div>
                    <h4>space</h4>
                    <input type="number" value="10" step="1" name="axis[x-space]"/>
                </div>
            </div>
            <div class="title">
                <h2>Y-axis</h2>
                <div>
                    <h4>max</h4>
                    <input type="number" value="0" step="0.01" name="axis[y-max]"/>
                </div>
                <div>
                    <h4>min</h4>
                    <input type="number" value="-15" step="0.01" name="axis[y-min]"/>
                </div>
                <div>
                    <h4>space</h4>
                    <input type="number" value="1" step="0.1" name="axis[y-space]"/>
                </div>
            </div>
            <input type="submit" value="EXECUTE"/>
        </form>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Noticias</title>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand text-info" href="#">Noticias</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02">
                <span class="novbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                @section('menu')
                <li class="nav-item-active">
                    <a class="nav-link" href="{{ route('noticias.index') }}"> Noticias <span class="sr-only">(current)</span></a>
                </li>
                <li class= "nav-item">
                    <a class="nav-link" href="">
                        Noticias Nuevas
                    </a>
                </li>
                @show
                </ul>
            </div>
        </nav>
        
        <div class="jumbotron">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384kjk"></script>

    </body>
</html>

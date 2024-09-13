<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion CV</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <section>
        <div>
            <ul>
                <li><a href="{{route('cv.index')}}"><h2>Accueil</h2></a></li>
                <li><a href="{{route('cv.create')}}"><h2>Nouveau CV</h2></a></li>
            </ul>
        </div>
        @yield('content')  
    </section>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
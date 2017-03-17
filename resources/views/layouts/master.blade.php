<!DOCTYPE html>
<html>
<head>
    <title>Raw Data :: Safeline</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    @include('layouts.nav')

    <div class="container">
        <div class="section">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
</body>
</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('styles')
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="/" class="navbar-brand">NalogHelp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModal">Уплата налогов</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-pay-container">
        @yield('content')
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Вы...</h5>
                            <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                        </div>
                        <div class="modal-body">
                            <a href="/pay/?target=fl" class="text-center mt-4 d-block w-100 text-decoration-none">
                                <img class='my-card-link' src="https://img.icons8.com/bubbles/300/000000/man-with-beard-in-blue-shirt.png"/>
                                <p class="text-dark font-weight-bold">Физическое лицо</p>
                            </a>
                            <a href="/pay/?target=ip" class="text-center mt-4 d-block w-100 text-decoration-none">
                                <img class='my-card-link' src="https://img.icons8.com/bubbles/300/000000/business-man-in-blue-jacket.png"/>
                                <p class="text-dark font-weight-bold">Индивидуальный предприниматель</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>

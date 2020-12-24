<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nalog.ru</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Nalog.ru
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModal">Уплата налогов</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::id() == 1)
                                        <a class="dropdown-item" href="{{ route('tables') }}">
                                            Таблицы
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        Профиль
                                    </a>
                                    <a class="dropdown-item" href="{{ route('documents') }}">
                                        Мои документы
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <!-- Main-Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Вы...</h5>
                                <button class="close" data-dismiss="modal" aria-label="close">x</button>
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

            <!-- Spinner -->
                <div id="overlay">
                    <div class="cv-spinner">
                        <span class="spinner"></span>
                    </div>
                </div>
        </main>
    </div>
</body>
</html>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document-online.ru</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Document-online
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
                        <li class="nav-item">
                            <a href="{{ route('payment-request.create') }}" class="nav-link">Платежное требование</a>
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
                                        Мои налоговые квитанции
                                    </a>
                                    <a class="dropdown-item" href="{{ route('payment-request.index') }}">
                                        Мои платежные требования
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

                <!-- Button trigger modal -->
                <button data-show-success style="display:none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#savedSuccess">
                    Запустить модальное окно
                </button>
                <!-- модалка сохранения документа в лк -->
                <div class="modal fade" id="savedSuccess" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Документ сохранен</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Документ успешно сохранен в личный кабинет
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button data-show-error style="display:none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#error">
                    Запустить модальное окно
                </button>
                <!-- модалка ошибки -->
                <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ошибка</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                При выполнении операции произошла ошибка, пожалуйста, правильность введенных данных
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>
</html>

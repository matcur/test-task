<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body>
    <div id="app">
        <div class="row justify-content-center">
            <div class="alert alert-success" id="order-is-sent">
                Уведомлени, с вашим номером, отправлено администратору
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset($homePageInfo->logo_path) }}" alt="" class="logo">
                </a>
                <button class="btn btn-primary" id="order-call">
                    Заказать звонок
                </button>
                <form action="#" id="order-call-form" class="order-call-form card card-body">
                    <label for="order-phone">Ваш телефон</label>
                    <input type="text" id="order-phone" name="user_phone" required>
                    <label for="user-name">Ваше имя</label>
                    <input type="text" id="order-user-name" name="user_name" required>
                    <button class="btn btn-primary" id="order-call-btn">
                        Отправить
                    </button>
                </form>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        {!! $homePageInfo->footer_content !!}
        <script src="{{ asset('script.js') }}"></script>
        @yield('footer')
    </footer>
</body>
</html>

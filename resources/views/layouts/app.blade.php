<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    </head>
    <body>

        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="container">
            <div class="row">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>


        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                M.AutoInit();
            });
        </script>
        {{ $javascript }}
        <script>
            @if(Session::has('message'))
                M.toast({html: '{{ session('message')['tittle'] }}'})
            @endif
        </script>
    </body>
</html>

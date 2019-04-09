<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--   LES STYLES   -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- MY STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/monstyle.css') }}">


    <!-- jQuery, bootstrap -->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script> --}}
    <title>{{config('app.name', 'SGM-Info')}}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


</head>
<body>
    <div id="app">
            @include('inc.navbar')
        <div class="slider">
            @yield('slider')
        </div>
        <div class="row">

                <div class="container">
                    <article class="col-md-9">
                            <div class="messages">
                                    @include('inc.messages')
                            </div>
                        @yield('contenu')
                    </article>
                    <aside class="col-md-3">
                        @yield('aside')
                    </aside>
                </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Optional JavaScript  -->
    <script src="/websgm/public/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <!-- CKEDITOR-->
    {{-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}">
    </script> --}}

    <script>
    CKEDITOR.replace( 'ckeditor' );
    </script>


    <!-- Disparition de la div MESSAGE -->
    <script>
                    $('div.alert').not('.alert-important').delay(2000).hide('slow');
    </script>

 </body>
</html>

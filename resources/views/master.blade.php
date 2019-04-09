<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- MY STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/monstyle.css') }}">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <title>{{config('app.name', 'SGM-Info')}}</title>
  </head>
  <body>
    @include('inc.navbar')
    <div class="container">
        <div class="jumbotron">
            @yield('header')
        </div>
        <div class="messages">
        @include('inc.messages')
        </div>
        <div class="row">
            <article class="col-md-9">
                @yield('contenu')
            </article>
            <aside class="col-md-3">
                @yield('aside')
            </aside>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script> CKEDITOR.replace( 'article-ckeditor' ); </script>

    <!-- JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <!-- Disparition de la div MESSAGE -->
    <script>
                    $('div.alert').not('.alert-important').delay(2000).hide("slow");
    </script>

    </body>
</html>

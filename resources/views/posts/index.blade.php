@extends('layouts.app')


@section('contenu')
    @if(count($errors)>0)
        <div class="alert alert-danger">
            {{$errors}}
        </div>
    @endif
    <h1>Liste des ARTICLES</h1>
    @if (count($posts)>1)
        @foreach ($posts as $post )
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width: 100%" src="/websgm/public/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">

                        </div>
                    </div>
                    <div class="card-title">
                        <h2>
                            <a href="/websgm/public/Posts/{{$post->id}}">{{$post->titre}}</a>
                        </h2>
                        <div class="publication">
                            <span>{{$post->created_at}} par {{  $post->user['name'] }}</span>
                        </div>
                    </div>
                    <div class="card-title">
                         <article class="mesarticles">
                        {!!$post->article!!}
                        </article>
                    </div>
            </div>
        @endforeach
    {{$posts->links()}}
    @else
    <p>Aucun Article publié actuellement...</p>

    @endif


@endsection

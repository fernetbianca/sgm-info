@extends('layouts.app')

@section('contenu')
    <div id="publication" class="card">
            <div class="card-title">
            <h2> {{$post->titre}} </h2>
            <div class="image">
                <img style="width: 100%" src="/websgm/public/storage/cover_images/{{$post->cover_image}}">
            </div>
            <span>{{$post->created_at}} par {{  $post->user['name'] }}</span>
        </div>
        <hr>
        <div class="card-bod">
                <p>{!! $post->article !!}</p>
        </div>


    </div>
    @if(!Auth::guest())
    <div class="list-group">
        @if(Auth::user()->id == $post->user_id )
            <li class="list-group-item"><a href="/websgm/public/Posts/{{$post->id}}/edit" class="btn btn-secondary">Modifier</a></li>
            <li class="list-group-item">
                {!! Form::open( ['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=> 'pull-right']) !!}
                        {!! Form::hidden('_method','DELETE')!!}
                        {!! Form::submit('Supprimer',['class'=>'btn btn-danger'])!!}
                {!! Form::close()!!}
            </li>
        @endif
    </div>
    @endif
@endsection

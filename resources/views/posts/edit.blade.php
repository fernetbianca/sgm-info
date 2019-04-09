@extends('layouts.app')

@section('contenu')
    <h1> Modifier un Article </h1>
    {!! Form::open( ['action'  => ['PostsController@update', $post->id], 'method' => 'POST',
    'enctype'=>'multipart/form-data' ])!!}
        <div class="form-group">
            {{ Form::label('titre', 'Titre') }}
            {{ Form::text('titre', $post->titre, ['class'=>'form-control', 'placeholder'=>'Votre titre'] )}}
        </div>
        <div class="form-group">
                {{ Form::label('article', 'Contenu') }}
                {{Form::textarea( 'article', $post->article,
                [ 'class'=>'form-control', 'id'=>'ckeditor', 'placeholder'=>'Votre article']) }}
            <div class="form-group">
                    {{ Form::file('cover_image')}}
            </div>
                {{ Form::submit('Envoyer', ['class' => 'btn btn-primary']) }}

        </div>
     {{ Form::hidden('_method', 'PUT') }}
    {!! Form::close()!!}

@endsection

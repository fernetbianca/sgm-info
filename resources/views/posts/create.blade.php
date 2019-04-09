@extends('layouts.app')

@section('contenu')
    <h1> Créer un Article </h1>
    {!! Form::open( ['action'  => 'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data' ])!!}
        <div class="form-group">
            {{ Form::label('titre', 'Titre') }}
            {{ Form::text('titre', '', ['class'=>'form-control', 'placeholder'=>'Votre titre'] )}}
        </div>
        <div class="form-group">
                {{ Form::label('article', 'Les Articles') }}
                {{ Form::textarea( 'article', '',
                [ 'id'=>'ckeditor', 'class'=>'form-control',  'placeholder'=>'Votre TEXTE ici...'] )}}
                {{ Form::file('cover_image')}}
                {{ Form::submit('Envoyer', ['class' => 'btn btn-primary']) }}

        </div>
    {!! Form::close()!!}
@endsection

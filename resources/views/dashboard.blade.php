@extends('layouts.app')

@section('contenu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenue sur votre Tableau de Bord!</div>

                <div class="card-title">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    Pour créer un nouvel article:
                    <div class="btn btn-primary">
                    <a href="Posts/create"><span style="color:white;">Créer un article</span></a>
                    </div>

                </div>

            </div>

            <div class="card">
                    <div class="card-header">Vos Articles</div>
                    <table class="table table-striped  ">
                        <tr>
                            <th>Titre</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ( $posts as $post )
                            <tr>
                                <td>{{ $post->titre }} </td>
                                <td><a href="/websgm/public/Posts/{{$post->id}}/edit" class="btn btn-success ">Editer</a></td>
                                <td>
                                    {!! Form::open( ['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=> 'pull-right']) !!}
                                        {!! Form::hidden('_method','DELETE')!!}
                                        {!! Form::submit('Supprimer',['class'=>'btn btn-danger'])!!}
                                    {!! Form::close()!!}

                                </td>
                            </tr>
                        @endforeach

                    </table>
                     </div>

        </div>
    </div>
</div>
@endsection

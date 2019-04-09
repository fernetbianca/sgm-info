<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//Import des objets POSTS
use App\Post;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' =>['index', 'show']]);

    }
    public function index(){
        //retourne une page listant les POSTS
            $posts = Post::orderBy('id', 'desc')->paginate(7);
            return view('posts.index')->with('posts', $posts);
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }


    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' =>'required',
            'article' => 'required',
            'cover_image' =>'image|nullable|max:1999'
        ]);
        //Gestion de l'image
        if($request->hasFile('cover_image')){
            //Obtenir le nom du fichier avec l'extension
            $fileNameWitheExt = $request->file('cover_image')->getClientOriginalName();
            //Obtenir uniquement le nom de l'image
            $fileName = pathinfo($fileNameWitheExt, PATHINFO_FILENAME);
            //Obtenir l'extension de l'image
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Nom du fichier unique à enregistrer dans la base
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Sauvegarder l'image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else{
            $fileNameToStore = 'fileImage.jpg';
        }

        $post_save = new Post;
        $post_save->titre = $request->input('titre');
        $post_save->article = $request->input('article');


        $post_save->user_id = auth()->user()->id;
        $post_save->cover_image = $fileNameToStore;
        $post_save->save();





        $post_save->save();

        return redirect('/Posts')->with('success', 'Article enregistre dans la base...');
    }


    /**
     * Show the form for editing the specified resource.
     * $post->user['id']
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id == $post->user_id){
            return view('posts.edit')->with('post', $post);
        //return 'id: '. auth()->user()->id ;
        //return '   user_id: '.$post->user_id;
        }
        return redirect('/Posts')->with('error',
    "Vos droits d'accès sont insuffisants pour édier cet article...");


    //return $post;
       // return auth()->user()->id; //->1;
       // return $post->user_id; //-> 2
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Mise à jour des datas
        $this->validate($request, [
            'titre' =>'required',
            'article' => 'required'
        ]);
        //Gestion de l'image
        if($request->hasFile('cover_image')){
            //Obtenir le nom du fichier avec l'extension
            $fileNameWitheExt = $request->file('cover_image')->getClientOriginalName();
            //Obtenir uniquement le nom de l'image
            $fileName = pathinfo($fileNameWitheExt, PATHINFO_FILENAME);
            //Obtenir l'extension de l'image
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Nom du fichier unique à enregistrer dans la base
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Sauvegarder l'image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //Trouver le bon article
        $post_save = Post::find($id);
        $post_save->titre = $request->input('titre');
        $post_save->article = $request->input('article');
        if($request->hasFile('cover_image')){
            $post_save->cover_image =  $fileNameToStore;
        }
        $post_save->save();

        return redirect('/Posts')->with('success', 'Article mis à jour dans la base de données ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //vérifier que l'utilisateur est celui qui possède les articles
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('/public/cover_images/'.$post->cover_image);
        }
        if(auth()->user()->id == $post->user_id){
        $post->delete();
        return redirect('/Posts')->with('success', 'Article supprimé de la base de données avec succès.');
        }


        return redirect('/Posts')->with('error',
    "Vos droits d'accès sont insuffisants pour supprimer cet article...");

    }
}

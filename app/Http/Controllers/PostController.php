<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        echo "#{$post->id}  Titulo: {$post->title}<br>";
        echo "Subtitulo: {$post->subtitle} <br>";
        echo "Conteúdo: {$post->description}<br>";
        echo "Data de criação: {$post->createdBr} <br><hr>";

        // $post->title = 'Título de teste do meu Artigo!';
        // $post->save();

        $postAuthor = $post->author()->get()->first();
        if($postAuthor){
            echo "<h1>Dados do Usuário</h1><br>";
            echo "Nome do usuário: {$postAuthor->name}<br>";
            echo "Email: {$postAuthor->email}<br>";
        }

        $postCategorys = $post->categories()->get();

        if($postCategorys){
            echo "<h1>Categorias</h1><br>";
            foreach($postCategorys as $category) {
                echo "Categoria: #{$category->id} {$category->name}<br>";
            }
        }

        // $post->categories()->attach([3]); //adiciona categoria
        // $post->categories()->detach([3]);//remove um valor

        // $post->categories()->sync([5, 10]);
        // $post->categories()->syncWithoutDetaching([5, 6, 7]);

        // $post->comments()->create([
        //     'content' => 'Comentário 123'
        // ]);

        $comments = $post->comments()->get();
        if($comments){
            echo "<h1>Comentários</h1><br>";
            foreach($comments as $comment) {
                echo "Comentário: #{$comment->id} {$comment->content}<br>";
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

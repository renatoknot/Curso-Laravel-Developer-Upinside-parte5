<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::find($id);
        echo "<h1>Dados do Usuário</h1><br>";
        echo "Nome do usuário: {$user->name}<br>";
        echo "Email: {$user->email}<br>";

        $userAddress = $user->adressDelivery()->get()->first();
        if($userAddress){
            echo "<h1>Endereço de entrega</h1><br>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement}  CEP: {$userAddress->zipcode}<br>";
            echo "Cidade/Estado: {$userAddress->city}/{$userAddress->state}";
        }

        // $addressTest = new Address([
        //     'address' => 'Rua dos Bobos',
        //     'number' => 180,
        //     'complement'=> 'Antiga rua 35',
        //     'zipcode' => '21725660',
        //     'city' => 'Rio de Janeiro',
        //     'state' => 'Rio de Janeiro'
        // ]);

        // $address = new Address();
        // $address->address = 'Rua da Brisa';
        // $address->number = 180;
        // $address->complement = 'Antiga rua 35';
        // $address->zipcode = '21725660';
        // $address->city = 'Florianópolis';
        // $address->state = 'Santa Catarina';

        // $user->adressDelivery()->save($address);
        // $user->adressDelivery()->saveMany([$addressTest, $address]);

        // $user->adressDelivery()->create([
        //     'address' => 'Rua dos Bobos',
        //     'number' => 180,
        //     'complement'=> 'Antiga rua 35',
        //     'zipcode' => '21725660',
        //     'city' => 'Rio de Janeiro',
        //     'state' => 'Rio de Janeiro'
        // ]);

        // $user->adressDelivery()->createMany([[
        //     'address' => 'Rua dos Bobos',
        //     'number' => 180,
        //     'complement'=> 'Antiga rua 35',
        //     'zipcode' => '21725660',
        //     'city' => 'Rio de Janeiro',
        //     'state' => 'Rio de Janeiro'
        // ], [
        //     'address' => 'Rua Tessália',
        //     'number' => 17,
        //     'complement'=> '',
        //     'zipcode' => '21210120',
        //     'city' => 'Rio de Janeiro',
        //     'state' => 'Rio de Janeiro'
        // ]]);

        // $users = User::with('adressDelivery')->get();
        // dump($users);
        $posts = $user->posts()->orderBy('id', 'DESC')->take(2)->get();
        if($posts){
            echo "<h1>Artigos</h1><br>";
            foreach($posts as $post) {
                echo "#{$post->id}  Titulo: {$post->title}<br>";
                echo "Subtitulo: {$post->subtitle} <br>";
                echo "Conteúdo: {$post->description}<br><hr><br><br>";
            }
        }
        // dump($posts);
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

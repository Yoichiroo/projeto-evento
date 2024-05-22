<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index() {
        // $eventos = Evento::all();
        $busca = request('search');
        if($busca) {
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$busca.'%']
            ])->get();
        } else {
            $eventos = Evento::all();
        }

        return view('welcome', ['eventos' => $eventos, 'search' => $busca]);
    }

    public function criar() {
        return view ('eventos.criar');
    }

    public function store(Request $request) {
        $evento = new Evento;

        $evento->titulo = $request->titulo;
        $evento->desc = $request->desc;
        $evento->localidade = $request->localidade;
        $evento->privado = $request->privado;
        $evento->itens = $request->itens;
        $evento->data_evento = $request->data_evento;

    
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $query_img = $request->file('image'); // Obtém o arquivo da imagem
            $extensao = $query_img->extension(); // Obtém a extensão do arquivo

            $nome_imagem = md5($query_img->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $query_img->move(public_path('img/eventos'), $nome_imagem);
            $evento->img = $nome_imagem;
        }
    
        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $evento = Evento::findOrFail($id);
        return view('show', ['evento' => $evento]); 
    }
}
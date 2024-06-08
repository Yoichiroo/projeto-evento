<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\User;

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
    
        // Verificar se 'itens' é um array e serializá-lo
        if (is_array($request->itens)) {
            $evento->itens = json_encode($request->itens); // Serializa o array para JSON
        } else {
            $evento->itens = $request->itens;
        }
    
        $evento->data_evento = $request->data_evento;
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $query_img = $request->file('image'); // Obtém o arquivo da imagem
            $extensao = $query_img->extension(); // Obtém a extensão do arquivo
    
            $nome_imagem = md5($query_img->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $query_img->move(public_path('img/eventos'), $nome_imagem);
            $evento->img = $nome_imagem;
        }
    
        $usuario = auth()->user();
        $evento->user_id = $usuario->id;
    
        $evento->save();
    
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
    

    public function show($id) {
        $evento = Evento::with('users')->findOrFail($id);
        $dono_evento = User::where('id', $evento -> user_id) -> first() -> toArray();

        return view('eventos.show', ['evento' => $evento, 'dono_evento' => $dono_evento]); 

    }

    public function dashboard() {
        $usuario = auth() -> user();
        $eventos= $usuario -> eventos;

        return view('eventos.dashboard', ['eventos' => $eventos]);
    }

    public function destroy($id) {
        Evento::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id) {
        $evento = Evento::findOrFail($id);

        return view("eventos.edit", ['evento' => $evento]);
    }

    public function update(Request $request) {
        $dados = $request->all();
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $query_img = $request->file('image'); // Obtém o arquivo da imagem
            $extensao = $query_img->extension(); // Obtém a extensão do arquivo
            
            $nome_imagem = md5($query_img->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $query_img->move(public_path('img/eventos'), $nome_imagem);
            $dados['img'] = $nome_imagem;
        }
    
        $evento = Evento::findOrFail($request->id);
        $dados_filtrados = array_intersect_key($dados, array_flip($evento->getFillable()));
        $evento->update($dados_filtrados);
        
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id) {
        $user= auth()->user();
        $user->eventosParticipantes()->attach($id);
        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $evento->titulo . "!");
    }
}


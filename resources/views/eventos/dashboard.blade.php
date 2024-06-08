@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="content">
    <div class="col-md-10 offset-md-1 dashboard-titulo-container">
        <h1>Meus eventos</h1>
    </div>
    
    <div class="col-md-10 offset-md-1 dashboard-container-eventos">
        @if(count($eventos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td scope="row">{{ $loop -> index + 1 }}</td>
                            <td><a href="/eventos/{{$evento->id}}">{{ $evento -> titulo }}</a></td>
                            <td>0</td>
                            <td>
                                <a href="/eventos/edit/{{$evento->id}}" class="btn-acoes edit"><div class="flex-button"><i class="material-symbols-outlined branco">edit</i>Editar</div></a> 
                                <form action="/eventos/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-acoes delete"><div class="flex-button"><i class="material-symbols-outlined branco">delete</i>Deletar</div></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        @else
            <div class="nenhum-evento">
                <p>Você ainda não tem eventos, <a href="/eventos/criar">Criar um evento</a></p>
            </div>
        @endif
    </div>
</div>

@endsection
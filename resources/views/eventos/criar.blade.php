@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <form action="/eventos" method="post" enctype="multipart/form-data">
            @csrf
            <h1>Crie o seu evento</h1>
            <div class="form-group">
                <label for="img">Imagem do Evento:</label>
                <input type="file" name="image" id="img" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nome do Evento">
            </div>
            <div class="form-group">
                <label for="localidade">Local do Evento</label>
                <input type="text" class="form-control" name="localidade" id="localidade" placeholder="Ex: Rio de Janeiro, Maracanã">
            </div>
            <div class="form-group">
                <label for="desc">Descrição</label>
                <textarea name="desc" id="desc" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>
            <div class="form-group">
                <label for="privado">O evento é privado?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <input type="submit" value="Criar Evento" class="btn btn-primary">
        </form>
    </div>

@endsection
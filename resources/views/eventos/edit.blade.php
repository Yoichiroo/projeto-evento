@extends('layouts.main')

@section('title', 'Editando: ' . $evento->titulo)

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
        <form action="/eventos/update/{{$evento->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>Edite o evento "{{$evento->titulo}}"</h1>
            <div class="form-group">
                <label for="img">Imagem do Evento:</label>
                <input type="file" name="image" id="img" class="form-control-file">
                <img src="/img/eventos/{{$evento->img}}" alt="Imagem do evento" class="img-preview">
            </div>
            <div class="form-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nome do Evento" value = "{{$evento->titulo}}">
            </div>
            <div class="form-group">
                <label for="localidade">Local do Evento</label>
                <input type="text" class="form-control" name="localidade" id="localidade" placeholder="Ex: Rio de Janeiro, Maracanã" value="{{$evento->localidade}}">
            </div>
            <div class="form-group">
                <label for="data_evento">Data do Evento</label>
                <input type="date" class="form-control" name="data_evento" id="data_evento" value ="{{ \Carbon\Carbon::parse($evento->data_evento)->format('Y-m-d')}}">
            </div>
            <div class="form-group">
                <label for="desc">Descrição</label>
                <textarea name="desc" id="desc" class="form-control" placeholder="O que vai acontecer no evento?" required>{{$evento->desc}}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="cadeiras" value="Cadeiras"> <label  class="checkbox-label"for="cadeiras">Cadeiras</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="mesas" value="Mesas"> <label class="checkbox-label" for="mesas">Mesas</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="garcons" value="Garçons"> <label class="checkbox-label" for="garcons">Garçons</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="talheres" value="Talheres descartáveis"> <label class="checkbox-label" for="talheres">Talheres descartáveis</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="palco" value="Palco"> <label class="checkbox-label" for="palco">Palco</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="open_bar" value="Open Bar"> <label class="checkbox-label" for="open_bar">Open Bar</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="open_food" value="Open Food"> <label class="checkbox-label" for="open_food">Open Food</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="brindes" value="Brindes"> <label class="checkbox-label" for="brindes">Brindes</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="musica" value="Música"> <label class="checkbox-label" for="musica">Música</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" id="televisores" value="Televisores"> <label class="checkbox-label" for="televisores">Televisores</label>
                </div>
            </div>
            <div class="form-group">
                <label for="privado">O evento é privado?</label>
                <select name="privado" id="privado" class="form-control">
                    <option value="0"{{$evento->privado == 1 ? "selected = 'selected'" : ""}}>Não</option>
                    <option value="1" {{$evento->privado == 1 ? "selected = 'selected'" : ""}}>Sim</option>
                </select>
            </div>
            <input type="submit" value="Editar Evento" class="btn btn-primary">
        </form>
    </div>
@endsection
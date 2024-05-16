@extends('layouts.main')

@section('title', 'Home - LT Events')

@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" name="search" id="search" class="form-control" placeholder="Ex: Feira de São João">
        </form>
    </div>
    <div id="eventos-container" class="col-md-12">
        <div class="texto">
            <h2>Próximos Eventos</h2>
            <p>Veja os eventos dos próximos dias:</p>
        </div>
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    <img src="/img/eventos/{{ $evento -> img }}">
                    <div class="card-body">
                        <p class="card-date">10/03/2024</p>
                        <p class="card-title">{{$evento -> titulo}}</p>
                        <p class="card-participants">0 Participantes</p>
                        <a href="/eventos/{{$evento->id}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
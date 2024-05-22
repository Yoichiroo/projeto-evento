@extends('layouts.main')

@section('title', 'Dashboard - LT Events')

@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="get" class="form-buscar-evento">
            <input type="text" name="search" id="search" class="form-control" placeholder="Ex: Feira de São João">
            <button type="submit" class="btn-primary"><i class="material-symbols-outlined">search</i></button>
        </form>
    </div>
    <div id="eventos-container" class="col-md-12">
        <div class="texto">
            @if($search)
            <h2>Buscando por "{{ $search }}"</h2>
            <p>Veja os eventos filtrados</p>
            @else
            <h2>Próximos Eventos</h2>
            <p>Veja os eventos dos próximos dias:</p>
            @endif
        </div>
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    <img src="/img/eventos/{{ $evento -> img }}">
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/Y'), strtotime($evento->data_evento)}}</p>
                        <p class="card-title">{{$evento -> titulo}}</p>
                        <p class="card-participants">0 Participantes</p>
                        <a href="/eventos/{{$evento->id}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($eventos) == 0 && $search)
                <p>Não foi possível encontrar nenhum evento com {{ $search }}. <a href="/">Ver todos</a></p>
            @elseif(count($eventos) == 0)
                <p>Não há eventos disponíveis.</p>
            @endif
        </div>
    </div>
@endsection
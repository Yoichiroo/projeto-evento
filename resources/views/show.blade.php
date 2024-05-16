@extends('layouts.main')

@section('title', $evento->titulo)

@section('content')
<div class="evento-show col-md-10 offset-md-1">
    <div class="flex-evento row">
        <div id="image-container" class="col-md-6">
            <img src="/img/eventos/{{$evento->img}}" class="img-fluid" alt="{{$evento->titulo}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$evento->titulo}}</h1>
            <p class="cidade-evento"><span class="material-symbols-outlined">location_on</span>{{ $evento->localidade }}</p>
            <p class="participantes-evento"><span class="material-symbols-outlined">groups</span>0 participantes</p>
            <p class="dono-evento"><span class="material-symbols-outlined">star</span>Dono do Evento</p>

            <div class="desc-evento">
                <h3>Sobre o evento:</h3>
                <p class="descricao-evento">
                    {{ $evento->desc }}
                </p>
            </div>
            <a href="#" class="btn btn-primary" id="confirmar-presenca">Confirmar Presença</a>
        </div>
    </div>
</div>
@endsection
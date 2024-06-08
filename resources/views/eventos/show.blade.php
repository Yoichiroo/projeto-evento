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
            <p class="data-evento"><span class="material-symbols-outlined">event</span>{{date('d/m/Y'), strtotime($evento->data_evento)}}</p>
            <p class="cidade-evento"><span class="material-symbols-outlined">location_on</span>{{ $evento->localidade }}</p>
            <p class="participantes-evento"><span class="material-symbols-outlined">groups</span>{{ $evento->users->count() }} Participantes</p>
            <p class="dono-evento"><span class="material-symbols-outlined">star</span>{{ $dono_evento['name'] }}</p>

            <div class="desc-evento">   
                <h3>Sobre o evento:</h3>
                <p class="descricao-evento">
                    {{ $evento->desc }}
                </p>
            </div>
            <h3>O evento conta com: </h3>
            <ul class="itens-list">
                @if ($evento->itens == null)
                    <p>O evento não conta com itens de infraestrutura.</p>
                @else
                    @php
                        $itensArray = json_decode($evento->itens, true);
                    @endphp

                    @foreach ($itensArray as $item)
                        <li>
                            <i class="material-symbols-outlined">check</i>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                @endif
            </ul>

            <form action="/eventos/join/{{$evento->id}}" method="POST">
                @csrf
                <a href="" class="btn btn-primary" id="confirmar-presenca" onclick="event.preventDefault() 
                this.closest('form').submit()">Confirmar Presença</a>
            </form>
        </div>
    </div>
</div>
@endsection
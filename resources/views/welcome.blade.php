@extends('layout.main')

@section('title, HDC Events')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bowlby+One+SC&display=swap" rel="stylesheet">

<div id="search-container" class="col-md-12">
  <h1 class="busque">Encontre seu Evento</h1>
  <form action="/" method="$_GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
  </form>
</div>
<div id="events-container" class="col-md-12">
       @if($search)
       <h2>Buscando por: {{ $search }}</h2>
       @else
       <h2>Proximos Jogos da Seleção</h2>
       <p class="subtitle">Veja os eventos dos proximos dias</p>
       @endif
   
  <div id="cards-container" class="row tt">
    @foreach($events as $event)
    <div class="card col-md-3">
      <img src="/img/brasileiros-no-exterior.jpeg" alt="{{ $event->title }}">
      <div class="card-body">
        <p class="card-date">{{ date('d/m/Y' , strtotime($event->date)) }}</p>
        <h5 class="card-title">{{ $event->title }}</h5>
        <p class="card-participants">{{ count($event->users) }} participantes</p>
        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
      </div>
    </div>
    @endforeach
    @if(count($events) == 0 && $search)
        <p class="noevents">Nao há evento chamado de {{ $search }}! <a href="/">Ver todos</a> </p>
    @elseif(count ($events) == 0)
    @endif    
  </div>
</div>

@endsection
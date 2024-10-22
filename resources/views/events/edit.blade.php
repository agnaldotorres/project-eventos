@extends('layout.main')

@section('title', 'Editando') 

@section('content')

<div id="event-create-container" class="l-md-6 offset-md-3">
    <h1 class="crie">Editando: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file"> 
            <img src="/img/brasileiros-no-exterior.jpeg" alt="{{ $event->title }}" class="img-preview">
        </div>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
        </div>

        <div class="form-group">
            <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" 
                 value="{{date('Y-m-d', strtotime($event->date));}}">
        </div>


        <div class="form-group">
            <label for="pais">País:</label> 
            <input type="text" class="form-control" id="pais" name="pais" placeholder="Qual país"  value="{{ $event->pais }}">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade:" value="{{ $event->cidade }}">
        </div>

        <div class="form-group">
            <label for="private">O evento é privado?:</label>
            <select class="form-control" id="private" name="private">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected": "" }}>Sim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai rolar no evento?">{{ $event->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="items">Adicione itens de infraestrutura:</label> 
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Gratis"> Cerveja Gratis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

@endsection

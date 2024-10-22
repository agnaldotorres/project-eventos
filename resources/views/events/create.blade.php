@extends('layout.main')

@section('title', 'Criar evento') 

@section('content')

<div id="event-create-container" class="l-md-6 offset-md-3">
    <h1 class="crie">Crie o seu evento</h1>

    

    
    <form action="/events" method="POST" enctype="multipart/form-data"> 
        @csrf

        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file"> 
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
            @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pais">País:</label> 
            <input type="text" class="form-control" id="pais" name="pais" placeholder="Qual país" value="{{ old('pais') }}">
            @error('pais')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade:" value="{{ old('cidade') }}">
            @error('cidade')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="private">O evento é privado?:</label>
            <select class="form-control" id="private" name="private">
                <option value="0" {{ old('private') == 0 ? 'selected' : '' }}>Não</option>
                <option value="1" {{ old('private') == 1 ? 'selected' : '' }}>Sim</option>
            </select>
            @error('private')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai rolar no evento?">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Adicione itens de infraestrutura:</label> 
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
            @error('items')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>

</div>

@endsection

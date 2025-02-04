@extends('layout.main')

@section('title','Dashboard')

@section('content')

<div class="container-evento">
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1 class="meus">Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
            <table class="table meus-eventos" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}">{{  $event->title }} </a></td>
                            <td>{{ count ($event->users) }}</td>
                            <td>
                                <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"> <ion-icon name="create-outline" ></ion-icon>  Editar</a> 
                                <form action="/events/{{ $event->id }}" method="POST"   style="display: inline;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
            @else
            <p>Você ainda não tem eventos, <a href="/events/create">Criar evento</a> </p>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1 class="meus"> Jogos Irei Participar</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
    @if(count($eventsasparticipant)> 0)
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
                    @foreach($eventsasparticipant as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}">{{  $event->title }} </a></td>
                            <td>{{ count ($event->users) }}</td>
                            <td>
                                <form action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf 
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Sair do evento
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
    @else
    <p>Voce esta sem evento para ir</p>
    @endif
    </div>

</div>


@endsection
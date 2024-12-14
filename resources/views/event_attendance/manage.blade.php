@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gerenciar Entradas no Evento: {{ $event->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Início:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y H:i') }}</p>
                <p><strong>Fim:</strong> {{ \Carbon\Carbon::parse($event->end_datetime)->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Colaboradores no Evento</h3>
            </div>
            <div class="card-body">
                @if($attendees->isEmpty())
                    <p class="text-center">Nenhum colaborador presente.</p>
                @else
                    <ul class="list-group">
                        @foreach($attendees as $attendee)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $attendee->name }}
                                <form action="{{ route('event.attendances.remove', [$event->id, $attendee->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Adicionar Colaboradores</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('event.attendances.store', $event->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="person_id">Selecione o Colaborador:</label>
                        <select name="person_id" id="person_id" class="form-control" required>
                            @foreach($people as $person)
                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
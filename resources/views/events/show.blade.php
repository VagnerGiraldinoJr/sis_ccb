@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Evento: {{ $event->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Início:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y H:i') }}</p>
                <p><strong>Fim:</strong> {{ \Carbon\Carbon::parse($event->end_datetime)->format('d/m/Y H:i') }}</p>
                <a href="{{ route('event.attendances.create', $event->id) }}" class="btn btn-primary">Adicionar Colaborador</a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Colaboradores</h3>
            </div>
            <div class="card-body">
                @if($attendees->isEmpty())
                    <p class="text-center">Não há colaboradores no evento.</p>
                @else
                    <ul class="list-group">
                        @foreach($attendees as $attendee)
                            <li class="list-group-item">{{ $attendee->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
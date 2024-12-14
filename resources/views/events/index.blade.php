@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Eventos</h3>
                <a href="{{ route('events.create') }}" class="btn btn-primary float-right">Novo Evento</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->end_datetime)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Participantes</a>
                                    <a href="{{ route('events.edit', $event->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhum evento encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

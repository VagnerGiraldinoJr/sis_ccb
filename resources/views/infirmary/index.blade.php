@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Prontuários de {{ $person->name }}</h3>
                <a href="{{ route('infirmary.create', ['person' => $person->id]) }}" class="btn btn-primary float-right">Novo Prontuário</a>
            </div>
            <div class="card-body">
                @if ($person->infirmaryEntries->isEmpty())
                    <p class="text-center">Nenhum prontuário encontrado.</p>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Temperatura</th>
                                <th>Altura</th>
                                <th>Observações</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($person->infirmaryEntries as $entry)
                                <tr>
                                    <td>{{ $entry->id }}</td>
                                    <td>{{ $entry->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $entry->temperature }}</td>
                                    <td>{{ $entry->height }}</td>
                                    <td>{{ $entry->observations }}</td>
                                    <td>
                                        <a href="{{ route('infirmary.show', $entry->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                                        <a href="{{ route('infirmary.edit', $entry->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('infirmary.destroy', $entry->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
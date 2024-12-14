@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalhes do Prontuário</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $entry->id }}</td>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <td>{{ $entry->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Temperatura</th>
                        <td>{{ $entry->temperature }}</td>
                    </tr>
                    <tr>
                        <th>Altura</th>
                        <td>{{ $entry->height }}</td>
                    </tr>
                    <tr>
                        <th>Medicamento</th>
                        <td>{{ $entry->takes_medication ? $entry->medication : 'Não' }}</td>
                    </tr>
                    <tr>
                        <th>Alergias</th>
                        <td>{{ $entry->has_allergies ? $entry->allergies : 'Não' }}</td>
                    </tr>
                    <tr>
                        <th>Observações</th>
                        <td>{{ $entry->observations }}</td>
                    </tr>
                </table>
                <a href="{{ route('infirmary.index', ['person' => $entry->person_id]) }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
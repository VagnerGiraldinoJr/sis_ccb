@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selecionar Colaborador</h3>
                <form method="GET" action="{{ route('infirmary.select-person') }}" class="form-inline float-right">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou email"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Prontuários</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($people as $person)
                            <tr>
                                <td>{{ $person->id }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ $person->infirmary_entries_count }}</td>
                                <td>
                                    <a href="{{ route('infirmary.create', ['person' => $person->id]) }}"
                                        class="btn btn-primary btn-sm">Criar Prontuário</a>
                                    @if ($person->infirmary_entries_count > 0)
                                        <a href="{{ route('infirmary.index', ['person' => $person->id]) }}"
                                            class="btn btn-info btn-sm">Ver Prontuários</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
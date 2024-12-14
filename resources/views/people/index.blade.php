@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Colaboradores</h3>
                <a href="{{ route('people.create') }}" class="btn btn-primary float-right">Novo Cadastro</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Congregação</th>
                            <th>Endereço</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($people as $person)
                            <tr>
                                <td>{{ $person->id }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ ucfirst($person->type) }}</td>
                                <td>{{ $person->congregation }}</td>
                                <td>{{ $person->address }}</td>
                                <td>{{ $person->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('people.edit', $person->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('people.destroy', $person->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Nenhum registro encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Cadastro</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('people.update', $person->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $person->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $person->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="administrador" {{ $person->type == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="cooperador" {{ $person->type == 'cooperador' ? 'selected' : '' }}>Cooperador</option>
                        <option value="ancião" {{ $person->type == 'ancião' ? 'selected' : '' }}>Ancião</option>
                        <option value="diácono" {{ $person->type == 'diácono' ? 'selected' : '' }}>Diácono</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Endereço</label>
                    <textarea name="address" id="address" class="form-control" required>{{ old('address', $person->address) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="congregation">Congregação</label>
                    <input type="text" name="congregation" id="congregation" class="form-control" value="{{ old('congregation', $person->congregation) }}" required>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('people.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Novo Cadastro</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('people.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="administrador">Administrador</option>
                            <option value="cooperador">Cooperador</option>
                            <option value="ancião">Ancião</option>
                            <option value="diácono">Diácono</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <textarea name="address" id="address" class="form-control" required>{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="congregation">Comum Congregação</label>
                        <input type="text" name="congregation" id="congregation" class="form-control"
                            value="{{ old('congregation') }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ route('people.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection

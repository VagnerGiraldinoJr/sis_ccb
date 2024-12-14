@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Igreja</h3>
                <a href="{{ route('igreja.index') }}" class="btn btn-secondary float-right">Voltar</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('igreja.update', $igreja->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">Nome da Igreja</label>
                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                   name="nome"
                                   value="{{ old('nome', $igreja->nome) }}" required>
                            @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cep" class="col-md-4 col-form-label text-md-right">CEP</label>
                        <div class="col-md-6">
                            <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                   name="cep"
                                   value="{{ old('cep', $igreja->cep) }}" required>
                            @error('cep')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logradouro" class="col-md-4 col-form-label text-md-right">Logradouro</label>
                        <div class="col-md-6">
                            <input id="logradouro" type="text"
                                   class="form-control @error('logradouro') is-invalid @enderror"
                                   name="logradouro" value="{{ old('logradouro', $igreja->logradouro) }}" required>
                            @error('logradouro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>
                        <div class="col-md-6">
                            <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror"
                                   name="bairro"
                                   value="{{ old('bairro', $igreja->bairro) }}" required>
                            @error('bairro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
                        <div class="col-md-6">
                            <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror"
                                   name="cidade"
                                   value="{{ old('cidade', $igreja->cidade) }}" required>
                            @error('cidade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>
                        <div class="col-md-6">
                            <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror"
                                   name="estado"
                                   value="{{ old('estado', $igreja->estado) }}" required>
                            @error('estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numero" class="col-md-4 col-form-label text-md-right">Número</label>
                        <div class="col-md-6">
                            <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror"
                                   name="numero"
                                   value="{{ old('numero', $igreja->numero) }}" required>
                            @error('numero')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Atualizar Igreja
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Igreja</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('igreja.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nome"
                               class="col-md-4 col-form-label text-md-right">{{ __('Nome da Igreja') }}</label>
                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                   name="nome" required>
                            @error('nome')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>
                        <div class="col-md-6">
                            <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                   name="cep" required>
                            @error('cep')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logradouro"
                               class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>
                        <div class="col-md-6">
                            <input id="logradouro" type="text"
                                   class="form-control @error('logradouro') is-invalid @enderror" name="logradouro"
                                   required>
                            @error('logradouro')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
                        <div class="col-md-6">
                            <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror"
                                   name="bairro" required>
                            @error('bairro')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                        <div class="col-md-6">
                            <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror"
                                   name="cidade" required>
                            @error('cidade')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                        <div class="col-md-6">
                            <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror"
                                   name="estado" required>
                            @error('estado')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>
                        <div class="col-md-6">
                            <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror"
                                   name="numero" required>
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
                                {{ __('Cadastrar Igreja') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('cep').addEventListener('blur', function () {
            var cep = this.value.replace(/\D/g, ''); // Remove tudo que não é número
            if (cep.length === 8) {
                fetch(`/buscar-cep?cep=${cep}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    })
                    .catch(error => alert('Erro ao buscar o endereço.'));
            }
        });

        // Limpa o CEP antes de enviar o formulário
        document.querySelector('form').addEventListener('submit', function () {
            var cepInput = document.getElementById('cep');
            cepInput.value = cepInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos, incluindo '-'
        });
    </script>
@endsection

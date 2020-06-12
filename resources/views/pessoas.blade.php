@extends('template')
    
@section('content')
    <div>
        <h1>Adicionar Pessoa</h1>
        <form action="{{ route('pessoas.create')}}" method="POST" class="row">
            @csrf
            @method('POST')
            <div class="col-12">
                <legend for="nome">Nome:</legend>
                <input id="nome" type="text" name="nome" class="form-control">
            </div>
            <div class="col-12">
                <legend for="cpf">CPF:</legend>
                <input id="cpf" type="text" name="cpf" class="form-control" maxlength="11">
            </div>
            <div class="col-6">
                <legend for="email">E-mail:</legend>
                <input id="email" type="text" name="email" class="form-control">
            </div>
            <div class="col-6">
                <legend for="data_nasc">Data de Nascimento:</legend>
                <input id="data_nasc" type="date" name="data_nasc" class="form-control" max="9999-12-31">
            </div>
            <div class="col-6">
                <legend for="nome">Nacionalidade:</legend>
                <input id="nacionalidade" type="text" name="nacionalidade" class="form-control">
            </div>
            <div class="col-6">
                <input type="submit" value="enviar" class="btn btn-info mt-2 float-right">
            </div>
        </form>

    </div>
    
    <div class="row mt-4">
        @foreach($pessoas as $pessoa)
            <div class="card m-1">
                <div class="card-body">
                    <p>Nome: {{$pessoa->nome}}</p>
                    <p>CPF: {{$pessoa->cpf}}</p>
                    <p>E-mail: {{$pessoa->email}}</p>
                    <p>Data Nascimento: {{$pessoa->data_nasc}}</p>
                    <p>Nacionalidade: {{$pessoa->nacionalidade}}</p>
                    <p><a href="{{ route('pessoas.edit', $pessoa->id) }}" class="btn btn-info float-left">Editar</a></p>
                    <p>
                        <form method="POST" action="{{ route('pessoas.destroy', $pessoa->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger float-right">Excluir</button>
                        </form>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@extends('template')
    
@section('content')
    <div>
        <form action="{{ route('pessoas.update', request()->id)}}" method="POST" class="row">
            @csrf
            @method('PUT')
            <div class="col-12">
                <legend for="nome">Nome:</legend>
            <input id="nome" type="text" name="nome" class="form-control" value="{{$pessoa->nome}}">
            </div>
            <div class="col-12">
                <legend for="cpf">CPF:</legend>
                <input id="cpf" type="text" name="cpf" class="form-control" maxlength="11" value="{{$pessoa->cpf}}">
            </div>
            <div class="col-6">
                <legend for="email">E-mail:</legend>
                <input id="email" type="text" name="email" class="form-control" value="{{$pessoa->email}}">
            </div>
            <div class="col-6">
                <legend for="data_nasc">Data de Nascimento:</legend>
                <input id="data_nasc" type="date" name="data_nasc" class="form-control" max="9999-12-31" value="{{ date('Y-m-d', strtotime($pessoa->data_nasc)) }}">
            </div>
            <div class="col-6">
                <legend for="nome">Nacionalidade:</legend>
                <input id="nacionalidade" type="text" name="nacionalidade" class="form-control" value="{{$pessoa->nacionalidade}}">
            </div>
            <div class="col-6">
                <input type="submit" value="Atualizar" class="btn btn-info mt-2 float-right">
            </div>
        </form>

    </div>

@endsection
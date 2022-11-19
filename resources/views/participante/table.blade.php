@extends('layouts.app')

@section('titulo', 'Cadastrar Participante')

@section('conteudo')
    <a href="/cadastro/participantes" method="GET" class="btn btn-success">Criar</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participantes as $participante)
                <tr>
                    <td> {{ $participante->nome.' '.$participante->sobrenome}}</td>
                    <td> {{ $participante->endereco }}</td>
                    <td> {{ $participante->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($cadastro_sucesso)
        <div class="alert alert-success" role="alert">
            Cadastro realizado com suceso!
        </div>
    @endif
@endsection

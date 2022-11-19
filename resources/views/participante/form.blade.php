@extends('layouts.app')

@section('titulo', 'Cadastrar Participante')

@section('conteudo')
    <form action="/cadastro/participantes" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text"
                           class="form-control"
                           id="nome"
                           name="nome"
                           aria-describedby="nome_ajuda">
                    <small id="nome_ajuda" class="form-text text-muted">
                        {{$errors->first('nome')}}</small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sobrenome</label>
                    <input type="text"
                           class="form-control"
                           id="sobrenome"
                           name="sobrenome"
                           aria-describedby="sobrenome_ajuda">
                    <small id="sobrenome_ajuda" class="form-text text-muted">
                        {{$errors->first('sobrenome')}}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Data de nascimento</label>
                    <input type="date"
                           class="form-control"
                           name="data_nascimento"
                           id="data_nascimento"
                           aria-describedby="data_nascimento_ajuda">
                    <small id="data_nascimento_ajuda" class="form-text text-muted">
                        {{$errors->first('data_nascimento')}}</small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input type="text"
                           class="form-control"
                           name="endereco"
                           id="endereco"
                           aria-describedby="endereco_ajuda">
                    <small id="endereco_ajuda" class="form-text text-muted">
                        {{$errors->first('endereco')}}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           aria-describedby="email_ajuda">
                    <small id="email_ajuda" class="form-text text-muted">
                        {{$errors->first('email')}}</small>
                </div>
            </div>
        </div>
        <a href="/painel/inscritos" method="GET" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection

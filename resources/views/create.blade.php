@extends('layouts.main')

@section('title', 'Adicionar aluno(a)')

@section('content')

<div id="student-create-container" class="col-md-6 offset-md-3">
    <h1>Adicione o aluno</h1>
    <form action="/students" method="POST">
        <div class="form-goup">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" class="nome" placeholder="Nome do aluno">
        </div>
        <div class="form-goup">
            <label for="idade">Idade</label>
            <input type="number" class="form-control" id="idade" class="idade" placeholder="Nome do aluno">
        </div>
        <div class="form-goup">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" class="cpf" placeholder="123.456.789-10">
        </div>
        <div class="form-goup">
            <label for="rgm">RGM</label>
            <input type="text" class="form-control" id="rgm" class="rgm" placeholder="12345678">
        </div>
        <div class="form-goup">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" class="nome" placeholder="Nome do aluno">
        </div>
        <div class="form-goup">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" class="nome" placeholder="Nome do aluno">
        </div>
    </form>
</div>
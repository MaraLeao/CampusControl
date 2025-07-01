@extends('layouts.main')

@section('title', 'Adicionar aluno(a)')

@section('content')

<div id="student-create-container" class="col-md-6 offset-md-3">
    <h1>Adicione o aluno</h1>
    <form action="/students" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do aluno" required>
        </div>
        
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" placeholder="Idade do aluno" required>
        </div>
        
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="123.456.789-10" required>
        </div>
        
        <div class="form-group">
            <label for="rgm">RGM</label>
            <input type="text" class="form-control" id="rgm" name="rgm" placeholder="12345678" required>
        </div>
        
        <div class="form-group">
            <label for="genero">Gênero</label>
            <select class="form-control" id="genero" name="genero" required>
                <option value="">Selecione...</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="curso">Curso</label>
            <input type="text" class="form-control" id="curso" name="curso" placeholder="Ciência da Computação..." required>
        </div>
        
        <div class="form-group">
            <label for="campus">Campus</label>
            <input type="text" class="form-control" id="campus" name="campus" placeholder="Sede, II, IV ..." required>
        </div>
        
        <div class="form-group">
            <label for="inicio">Data de Início</label>
            <input type="date" class="form-control" id="inicio" name="inicio" required>
        </div>
        
        <div class="form-group">
            <label for="ativo">
                <input type="checkbox" id="ativo" name="ativo" value="1" checked> 
                Aluno Ativo
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Aluno</button>
    </form>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Editar Aluno')

@section('content')

<div id="student-edit-container" class="col-md-6 offset-md-3">
    <h1>Editar Aluno</h1>
    
    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" 
                   value="{{ old('nome', $student->nome) }}" placeholder="Nome do aluno" required>
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" 
                   value="{{ old('idade', $student->idade) }}" placeholder="Idade do aluno" required>
            @error('idade')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" 
                   value="{{ old('cpf', $student->cpf) }}" placeholder="123.456.789-10" required>
            @error('cpf')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="rgm">RGM</label>
            <input type="text" class="form-control" id="rgm" name="rgm" 
                   value="{{ old('rgm', $student->rgm) }}" placeholder="12345678" required>
            @error('rgm')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="genero">Gênero</label>
            <select class="form-control" id="genero" name="genero" required>
                <option value="">Selecione...</option>
                <option value="M" {{ old('genero', $student->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('genero', $student->genero) == 'F' ? 'selected' : '' }}>Feminino</option>
                <option value="O" {{ old('genero', $student->genero) == 'O' ? 'selected' : '' }}>Outro</option>
            </select>
            @error('genero')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="curso">Curso</label>
            <input type="text" class="form-control" id="curso" name="curso" 
                   value="{{ old('curso', $student->curso) }}" placeholder="Ciência da Computação..." required>
            @error('curso')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="campus">Campus</label>
            <input type="text" class="form-control" id="campus" name="campus" 
                   value="{{ old('campus', $student->campus) }}" placeholder="Sede, II, IV ..." required>
            @error('campus')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="inicio">Data de Início</label>
            <input type="date" class="form-control" id="inicio" name="inicio" 
                   value="{{ old('inicio', $student->inicio->format('Y-m-d')) }}" required>
            @error('inicio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ativo">
                <input type="checkbox" id="ativo" name="ativo" value="1" 
                       {{ old('ativo', $student->ativo) ? 'checked' : '' }}> 
                Aluno Ativo
            </label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>
            
            <a href="/students/{{ $student->id }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>
        </div>
    </form>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Alunos Inativos')

@section('content')

<h2 class="mb-4">Lista de Estudantes Inativos</h2>

<a href="{{ url('/') }}" class="btn btn-secondary mb-3">Voltar</a>

<div class="alert alert-warning mb-4">
    <strong>{{ count($students) }}</strong> aluno(s) inativo(s)
</div>

<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>RGM</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->nome }}</td>
                <td>{{ $student->idade }}</td>
                <td>{{ $student->rgm }}</td>
                <td>{{ $student->curso }}</td>
                <td>
                    <form action="/students/{{ $student->id }}/activate" method="POST" style="display:inline;" 
                          onsubmit="return confirm('Tem certeza que deseja reativar este aluno?')">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm" title="Reativar">
                            <i class="fas fa-check"></i> Reativar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

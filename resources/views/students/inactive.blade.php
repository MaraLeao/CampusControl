@extends('layouts.main')

@section('title', 'Alunos Inativos')

@section('content')

    <h2>Lista de Estudantes Inativos</h2>
    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="alert alert-warning">
        <strong>{{ count($students) }}</strong> aluno(s) inativo(s)
    </div>

    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>RGM</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>

        @foreach($students as $student)
            <tr>
                <td>{{ $student->nome }}</td>
                <td>{{ $student->idade }}</td>
                <td>{{ $student->rgm }}</td>
                <td>{{ $student->curso }}</td>
                <td>
                    <form action="/students/{{ $student->id }}/activate" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            Reativar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection

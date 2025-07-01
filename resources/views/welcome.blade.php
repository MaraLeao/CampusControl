@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

<h2 class="mb-4">Lista de Estudantes</h2>

<div class="mb-3 d-flex gap-2">
    <a href="{{ route('students.create') }}" class="btn btn-primary">
        Novo Aluno
    </a>
    <a href="{{ route('students.inactive') }}" class="btn btn-outline-secondary">
        Ver Inativos
    </a>
</div>

<div class="alert alert-info mb-4">
    <strong>{{ count($students) }}</strong> aluno(s) ativo(s)
</div>

<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>RGM</th>
            <th>Gênero</th>
            <th>Campus</th>
            <th>Curso</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->nome }}</td>
                <td>{{ $student->idade }}</td>
                <td>{{ $student->rgm }}</td>
                <td>
                    @if($student->genero == 'M')
                        Homem
                    @elseif($student->genero == 'F')
                        Mulher
                    @else
                        Outro
                    @endif
                </td>
                <td>{{ $student->campus }}</td>
                <td>{{ $student->curso }}</td>
                <td>
                    @if ($student->ativo)
                        <span class="badge bg-success">Matrícula ativa</span>
                    @else
                        <span class="badge bg-danger">Matrícula inativa</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="/students/{{ $student->id }}/edit" class="btn btn-warning btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="/students/{{ $student->id }}/activate" method="POST" onsubmit="return confirm('Tem certeza que deseja {{ $student->ativo ? 'inativar' : 'ativar' }} este aluno?')" style="display:inline;">
                            @csrf
                            @if($student->ativo)
                                <button type="submit" class="btn btn-danger btn-sm" title="Inativar">
                                    <i class="fas fa-user-times"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-success btn-sm" title="Ativar">
                                    <i class="fas fa-user-check"></i>
                                </button>
                            @endif
                        </form>

                        <a href="/students/{{ $student->id }}" class="btn btn-info btn-sm" title="Ver detalhes">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

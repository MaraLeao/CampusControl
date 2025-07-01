@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

    <h2>Lista de Estudantes</h2>
    <div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            Novo Aluno
        </a>
    </div>
    <a href="{{ route('students.inactive') }}" class="btn btn-outline-secondary mb-2">Ver Inativos</a>


    <div class="alert alert-info mb-3">
        <strong>{{ count($students) }}</strong> aluno(s) ativo(s)
    </div>

    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>RGM</th>
            <th>Gênero</th>
            <th>Campus</th>
            <th>Curso</th>
            <th>Situação</th>
        </tr>

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
                    @if ($student->ativo == 1) 
                        Matrícula ativa
                    @else
                        Matrícula inativa
                    @endif
                </td>

                <td class="d-flex gap-2">
                    <!-- Botão de Editar -->
                    <a href="/students/{{ $student->id }}/edit" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Editar
                    </a>

                    <!-- Botão de Inativar/Ativar -->
                    <form action="/students/{{ $student->id }}/activate" method="POST" style="display: inline;" 
                        onsubmit="return confirm('Tem certeza que deseja {{ $student->ativo ? 'inativar' : 'ativar' }} este aluno?')">
                        @csrf
                        @if($student->ativo)
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-user-times"></i> Inativar
                            </button>
                        @else
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-user-check"></i> Ativar
                            </button>
                        @endif
                    </form>

                    <!-- Botão de Visualizar (opcional) -->
                    <a href="/students/{{ $student->id }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
        @endforeach

    </table>
    
@endsection
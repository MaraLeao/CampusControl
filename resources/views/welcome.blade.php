@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')
    <h2>Lista de Estudantes</h2>

    <button> Adicionar novo aluno </button>

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
                @else 
                    Mulher
                @endif
            </td>

            <td>{{ $student->campus}}</td>
            <td>{{ $student->curso }}</td>

            <td>
                @if ($student->ativo == 1) 
                    Matrícula ativa
                @else
                    Matrícula inativa
                @endif
            </td>
        @endforeach
    </table>
    
@endsection
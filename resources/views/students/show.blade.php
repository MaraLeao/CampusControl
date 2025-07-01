@extends('layouts.main')

@section('title', 'Detalhes do Aluno')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h3 class="mb-0">Detalhes do Aluno</h3>
                    @if($student->ativo)
                        <span class="badge bg-success fs-6">Ativo</span>
                    @else
                        <span class="badge bg-danger fs-6">Inativo</span>
                    @endif
                </div>
                
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-3 text-secondary">Informações Pessoais</h5>
                            <p><strong>Nome:</strong> {{ $student->nome }}</p>
                            <p><strong>CPF:</strong> {{ substr_replace(substr_replace($student->cpf, '.', 3, 0), '.', 7, 0) }}</p>
                            <p><strong>RGM:</strong> {{ $student->rgm }}</p>
                            <p><strong>Idade:</strong> {{ $student->idade }} anos</p>
                            <p><strong>Gênero:</strong> 
                                @if($student->genero == 'M')
                                    Masculino
                                @elseif($student->genero == 'F')
                                    Feminino
                                @else
                                    Outro
                                @endif
                            </p>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="mb-3 text-secondary">Informações Acadêmicas</h5>
                            <p><strong>Curso:</strong> {{ $student->curso }}</p>
                            <p><strong>Campus:</strong> {{ $student->campus }}</p>
                            <p><strong>Data de Início:</strong>
                                {{ $student->inicio ? \Carbon\Carbon::parse($student->inicio)->format('d/m/Y') : 'Não informado' }}
                            </p>
                            <p><strong>Status:</strong> 
                                @if($student->ativo)
                                    <span class="text-success fw-bold">Ativo</span>
                                @else
                                    <span class="text-danger fw-bold">Inativo</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6 class="text-secondary">Informações do Sistema</h6>
                            <p><strong>Cadastrado em:</strong> 
                                {{ $student->created_at ? $student->created_at->format('d/m/Y H:i') : 'Não informado' }}
                            </p>
                            <p><strong>Última atualização:</strong> 
                                {{ $student->updated_at ? $student->updated_at->format('d/m/Y H:i') : 'Não informado' }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="/students" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Voltar
                    </a>
                    
                    <div>
                        <a href="/students/{{ $student->id }}/edit" class="btn btn-primary me-2">
                            <i class="fas fa-edit me-1"></i>Editar
                        </a>
                        
                        @if($student->ativo)
                            <form action="/students/{{ $student->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning" 
                                        onclick="return confirm('Tem certeza que deseja desativar este aluno?')">
                                    <i class="fas fa-ban me-1"></i>Desativar
                                </button>
                            </form>
                        @else
                            <form action="/students/{{ $student->id }}/activate" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-1"></i>Reativar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

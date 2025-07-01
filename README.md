# Campus Control 

Um sistema simples para gerenciar estudantes com funcionalidades de cadastro, edição, visualização, ativação e desativação (soft delete) usando Laravel.


## Funcionalidades

- Listagem de estudantes ativos e inativos
- Cadastro de novos estudantes
- Edição dos dados dos estudantes
- Visualização detalhada do estudante
- Ativação e desativação de estudantes (soft delete)
- Formatação e validação dos dados (CPF, idade, gênero, etc.)
- Interface amigável com botões para ações comuns


## Tecnologias Utilizadas

- PHP 8.1
- Laravel 10.48
- Blade Templates
- Bootstrap 5 (para estilização)
- FontAwesome (ícones)


## Como Rodar o Projeto

1. Clone este repositório:

   ```bash
   git clone https://github.com/MaraLeao/CampusControl
   cd CampusControl
    ```

2. Instale as dependências

    ```bash
    composer install
    ```
    ```bash
    npm install
    ```
    ```bash
    npm run dev
    ```

3. Configure o arquivo .env com suas credenciais do banco de dados.
4. Rode as migrations para criar as tabelas:
    ```bash
    php artisan migrate
    ```

5. Inicie o servidor local:
    ```bash
    php artisan serve
    ```

6. Acesse o sistema em http://localhost:8000



Rotas Principais
| Método | Rota | Descrição |
|--------|------|-----------|
|GET | / ou /students |	Lista estudantes ativos|
|GET | /students/create | Formulário para criar aluno
|POST|	/students | Salvar novo aluno
|GET |	/students/inativos | Lista estudantes inativos
|GET |	/students/{id}	| Visualizar detalhes do aluno
|GET |	/students/{id} | /edit	Editar aluno
|PUT |	/students/{id} | Atualizar aluno
|POST|	/students/{id} | /activate	Ativar/Inativar aluno




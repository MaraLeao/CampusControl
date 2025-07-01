<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::where('ativo', true)->get();
        return view('welcome',['students' => $students]);
    }

    public function create() {
        return view('students.create');
    }

    public function inactive()
    {
        $students = Student::where('ativo', false)->get();
        return view('students.inactive', ['students' => $students]);
    }

    public function store(Request $request) {
        try {

            $request->validate([
                'nome' => 'required|string|max:255',
                'cpf' => 'required|string|min:11|max:14',
                'rgm' => 'required|string|max:50',
                'idade' => 'required|numeric|min:1|max:120',
                'genero' => 'required|in:M,F,O',
                'curso' => 'required|string|max:255',
                'campus' => 'required|string|max:255', 
                'inicio' => 'required|date'
            ]);

            $student = Student::create([
                'nome' => $request->nome,
                'cpf' => preg_replace('/[^0-9]/', '', $request->cpf), 
                'rgm' => $request->rgm,
                'idade' => $request->idade,
                'genero' => $request->genero,
                'curso' => $request->curso,
                'campus' => $request->campus,
                'inicio' => $request->inicio,
                'ativo' => $request->has('ativo') ? true : false
            ]);

            return redirect('/')->with('msg', 'Aluno criado com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar aluno: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id) {
        $student = Student::findOrFail($id);
        return view('students.show', ['student' => $student]);
    }

    public function edit($id) {
        $student = Student::findOrFail($id);
        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|min:11|max:14',
            'rgm' => 'required|string|max:50',
            'idade' => 'required|numeric|min:1|max:120',
            'genero' => 'required|in:M,F,O',
            'curso' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'inicio' => 'required|date'
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'nome' => $request->nome,
            'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
            'rgm' => $request->rgm,
            'idade' => $request->idade,
            'genero' => $request->genero,
            'curso' => $request->curso,
            'campus' => $request->campus,
            'inicio' => $request->inicio,
            'ativo' => $request->has('ativo') ? true : false
        ]);

        return redirect('/')->with('msg', 'Aluno atualizado com sucesso!');
    }

    public function activate($id) {
        try {
            $student = Student::findOrFail($id);
            
            $student->ativo = !$student->ativo;
            $student->save();
            
            $status = $student->ativo ? 'ativado' : 'inativado';
            
            return redirect('/')->with('msg', "Aluno {$status} com sucesso!");
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Erro ao alterar status do aluno: ' . $e->getMessage());
        }
    }
}
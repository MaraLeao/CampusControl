<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{

    use RefreshDatabase;
    
    public function test_student_can_be_created() {
        $studentData = [
            'nome' => 'João Silva',
            'cpf' => '12345678901',
            'rgm' => '12345678',
            'idade' => 20,
            'genero' => 'M',
            'curso' => 'Engenharia de Software',
            'campus' => 'Sede',
            'inicio' => '2024-01-05',
            'ativo' => true
        ];

        $student = Student::create($studentData);

        $this->assertInstanceOf(Student::class, $student);
        $this->assertEquals('João Silva', $student->nome);
        $this->assertEquals('12345678901', $student->cpf);
        $this->assertEquals('12345678', $student->rgm);
        $this->assertEquals(20, $student->idade);
        $this->assertEquals('M', $student->genero);
        $this->assertEquals('Engenharia de Software', $student->curso);
        $this->assertEquals('Sede', $student->campus);$student->inicio->format('Y-m-d');
        $this->assertTrue($student->ativo);
        $this->assertDatabaseHas('students', [
            'nome' => 'João Silva',
            'cpf' => '12345678901',
            'rgm' => '12345678'
        ]);

    }

     public function test_student_nome_is_required()
    {

        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Student::create([
            'cpf' => '12345678901',
            'rgm' => '2024001',
            'idade' => 20,
            'genero' => 'Feminino',
            'curso' => 'Administração',
            'campus' => 'Campus Norte'
        ]);
    }

    public function test_student_cpf_must_be_unique()
    {        
        Student::create([
            'nome' => 'Maria Santos',
            'cpf' => '11111111111',
            'rgm' => '2024002',
            'idade' => 22,
            'genero' => 'Feminino',
            'curso' => 'Medicina',
            'campus' => 'Campus Sul'
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Student::create([
            'nome' => 'Pedro Oliveira',
            'cpf' => '11111111111',
            'rgm' => '2024003',
            'idade' => 19,
            'genero' => 'Masculino',
            'curso' => 'Direito',
            'campus' => 'Campus Leste'
        ]);
    }

    public function test_student_rgm_must_be_unique()
    {        
        Student::create([
            'nome' => 'Ana Costa',
            'cpf' => '22222222222',
            'rgm' => 'RGM2024',
            'idade' => 21,
            'genero' => 'Feminino',
            'curso' => 'Psicologia',
            'campus' => 'Campus Oeste'
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Student::create([
            'nome' => 'Carlos Lima',
            'cpf' => '33333333333',
            'rgm' => 'RGM2024', 
            'idade' => 23,
            'genero' => 'Masculino',
            'curso' => 'Física',
            'campus' => 'Campus Norte'
        ]);
    }

    public function test_student_can_be_updated()
    {
        $student = Student::create([
            'nome' => 'Laura Ferreira',
            'cpf' => '44444444444',
            'rgm' => '2024004',
            'idade' => 18,
            'genero' => 'Feminino',
            'curso' => 'Matemática',
            'campus' => 'Campus Central',
            'inicio' => '2024-02-01',
            'ativo' => true
        ]);

        $student->update([
            'nome' => 'Laura Ferreira Silva',
            'idade' => 19,
            'curso' => 'Matemática Aplicada',
            'campus' => 'Campus Sul'
        ]);

        $updatedStudent = $student->fresh();
        $this->assertEquals('Laura Ferreira Silva', $updatedStudent->nome);
        $this->assertEquals(19, $updatedStudent->idade);
        $this->assertEquals('Matemática Aplicada', $updatedStudent->curso);
        $this->assertEquals('Campus Sul', $updatedStudent->campus);
    }

    public function test_student_can_be_deactivated()
    {
        $student = Student::create([
            'nome' => 'Fernanda Lima',
            'cpf' => '66666666666',
            'rgm' => '2024006',
            'idade' => 22,
            'genero' => 'Feminino',
            'curso' => 'Biologia',
            'campus' => 'Campus Norte',
            'ativo' => true
        ]);

        $student->update(['ativo' => false]);

        $this->assertFalse($student->fresh()->ativo);
        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'ativo' => false
        ]);
    }

    public function test_student_ativo_is_cast_to_boolean()
    {
        $activeStudent = Student::create([
            'nome' => 'Camila Dias',
            'cpf' => '88888888888',
            'rgm' => '2024008',
            'idade' => 19,
            'genero' => 'Feminino',
            'curso' => 'Enfermagem',
            'campus' => 'Campus Sul',
            'ativo' => 1
        ]);

        $inactiveStudent = Student::create([
            'nome' => 'Ricardo Alves',
            'cpf' => '99999999999',
            'rgm' => '2024009',
            'idade' => 24,
            'genero' => 'Masculino',
            'curso' => 'Farmácia',
            'campus' => 'Campus Central',
            'ativo' => 0 
        ]);

        $this->assertTrue($activeStudent->ativo);
        $this->assertFalse($inactiveStudent->ativo);
        $this->assertIsBool($activeStudent->ativo);
        $this->assertIsBool($inactiveStudent->ativo);
    }

    public function test_student_attributes_are_fillable()
    {
        $fillableAttributes = [
            'nome', 'cpf', 'rgm', 'idade', 'genero', 
            'curso', 'campus', 'inicio', 'ativo'
        ];

        $student = new Student();
        
        $this->assertEquals($fillableAttributes, $student->getFillable());
    }

    public function test_can_find_active_students()
    {
        Student::create([
            'nome' => 'Estudante Ativo 1',
            'cpf' => '11111111101',
            'rgm' => 'ATIVO001',
            'idade' => 20,
            'genero' => 'Masculino',
            'curso' => 'Curso A',
            'campus' => 'Campus A',
            'ativo' => true
        ]);

        Student::create([
            'nome' => 'Estudante Ativo 2',
            'cpf' => '11111111102',
            'rgm' => 'ATIVO002',
            'idade' => 21,
            'genero' => 'Feminino',
            'curso' => 'Curso B',
            'campus' => 'Campus B',
            'ativo' => true
        ]);

        Student::create([
            'nome' => 'Estudante Inativo',
            'cpf' => '11111111103',
            'rgm' => 'INATIVO001',
            'idade' => 22,
            'genero' => 'Masculino',
            'curso' => 'Curso C',
            'campus' => 'Campus C',
            'ativo' => false
        ]);

        $activeStudents = Student::where('ativo', true)->get();
        $inactiveStudents = Student::where('ativo', false)->get();

        $this->assertCount(2, $activeStudents);
        $this->assertCount(1, $inactiveStudents);
    }
}

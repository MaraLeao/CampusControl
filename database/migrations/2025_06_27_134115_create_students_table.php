<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("rgm")->unique();
            $table->string("cpf")->unique();
            $table->string("nome");
            $table->decimal("idade");
            $table->char("genero");
            $table->string("curso");
            $table->string("campus");
            $table->date("inicio")->default(now());
            $table->boolean("ativo")->default(true);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

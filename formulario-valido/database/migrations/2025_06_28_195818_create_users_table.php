<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido');
        $table->string('cedula_ruc')->unique();
        $table->string('telefono');
        $table->date('fecha_nacimiento');
        $table->enum('genero', ['masculino', 'femenino', 'otro']);
        $table->string('direccion');
        $table->decimal('salario', 8, 2);
        $table->string('email')->unique();
        $table->string('sitio_web');
        $table->string('password');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

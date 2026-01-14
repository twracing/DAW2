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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Definicion de claves foraneas
            //Usuario que realiza el prestamo: users_table
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            //Libro prestado
            $table->foreignId('book_id')
                ->constrained('books')
                ->restrictOnDelete();
            //Fechjas del prestamo
            $table->date('loanned_at');
            //Fecha de vencimiento
            $table->date('due_at');
            //Fecha de devolucion (si no se ha devuelto es nula)
            $table->date('returned_at')->nullable();

            $table->string('status')->default('open'); //open | returned
            //Indice unico real: solo 1 prestamo abierto por libro
            $table->unique(['book_id', 'returned_at'], 'loans_book_open_unique');
            //Indice para optimizar consultas frecuentes
            $table->index(['user_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

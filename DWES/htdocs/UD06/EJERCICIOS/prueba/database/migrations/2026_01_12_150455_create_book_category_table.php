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
        Schema::create('book_category', function (Blueprint $table) {
        //Tabla pivote relacion muchos a muchos
        //Un libro puede tener muchas categorias
        //Una categoria puede tener muchos libros
        $table->id();
        $table->timestamps();
        //Definicion de claves foraneas
        $table->foreignId('book_id')
        ->constrained('books')
        ->cascadeOnDelete();
        $table->foreignId('category_id')
        ->constrained('categories')
        ->cascadeOnDelete();
        //Indice unico para evitar duplicados
        $table->unique(['book_id', 'category_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_category');
    }
};

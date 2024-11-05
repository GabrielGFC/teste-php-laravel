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
        // Exclui a tabela uploads se ela existir
        Schema::dropIfExists('uploads');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recria a tabela uploads caso a migration seja revertida
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }
};

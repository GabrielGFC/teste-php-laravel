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
        Schema::table('files', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com a tabela de usuários
            $table->string('file_path'); // Caminho do arquivo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            if (Schema::hasColumn('files', 'user_id')) {
                $table->dropForeign(['user_id']); // Remove apenas se a coluna existir
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('files', 'file_path')) {
                $table->dropColumn('file_path'); // Remove apenas se a coluna existir
            }
        });
    }
};

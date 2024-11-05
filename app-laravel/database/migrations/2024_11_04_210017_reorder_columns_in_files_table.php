<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE `files`
            MODIFY COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT FIRST,
            MODIFY COLUMN `user_id` BIGINT UNSIGNED AFTER `id`,
            MODIFY COLUMN `file_path` VARCHAR(255) AFTER `user_id`,
            MODIFY COLUMN `created_at` TIMESTAMP NULL DEFAULT NULL AFTER `file_path`,
            MODIFY COLUMN `updated_at` TIMESTAMP NULL DEFAULT NULL AFTER `created_at`;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverte as mudanças caso necessário, com a mesma lógica de SQL para restaurar a ordem anterior
    }
};

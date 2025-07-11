<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // ⚠️ Attention : cela supprimera toutes les sessions existantes !
        DB::statement('DROP TABLE IF EXISTS sessions');

        DB::statement('
            CREATE TABLE sessions (
                id VARCHAR(100) PRIMARY KEY,
                user_id BIGINT UNSIGNED NULL,
                ip_address VARCHAR(45) NULL,
                user_agent TEXT NULL,
                payload LONGTEXT NOT NULL,
                last_activity INT NOT NULL,
                INDEX (user_id),
                INDEX (last_activity)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ');
    }

    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS sessions');
    }
};

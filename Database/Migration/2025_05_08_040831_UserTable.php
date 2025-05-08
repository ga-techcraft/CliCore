<?php

namespace Database\Migration;

use Database\SchemaMigration;

class UserTable implements SchemaMigration{
    public function up(): array{
        return [
            "CREATE TABLE users ("
            ."id INT AUTO_INCREMENT PRIMARY KEY,"
            ."name VARCHAR(255) NOT NULL,"
            ."email VARCHAR(255) NOT NULL,"
            ."password VARCHAR(255) NOT NULL"
            .")"
        ];
    }

    public function down(): array{
        return [
            "DROP TABLE users"
        ];
    }
}
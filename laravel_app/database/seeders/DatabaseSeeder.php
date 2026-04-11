<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(base_path('../database_dump.json'));
        $data = json_decode($json, true);

        foreach ($data as $table => $rows) {
            // Skip Django, SQLite, and Auth internal tables that we didn't migrate
            if (str_starts_with($table, 'sqlite_') || 
                str_starts_with($table, 'django_') || 
                str_starts_with($table, 'auth_')) {
                continue;
            }

            foreach ($rows as $row) {
                DB::table($table)->insert($row);
            }
        }
    }
}

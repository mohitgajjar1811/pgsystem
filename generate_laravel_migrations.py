import sqlite3
import os
import re

conn = sqlite3.connect('db.sqlite3')
cursor = conn.cursor()

def map_type(sqlite_type):
    sqlite_type = sqlite_type.lower()
    if 'integer' in sqlite_type or 'int' in sqlite_type:
        return 'integer'
    elif 'varchar' in sqlite_type or 'char' in sqlite_type or 'text' in sqlite_type:
        # Prevent any size limit truncation errors by making everything 'text' types 
        # since SQLite ignores max lengths but MySQL strictly enforces them.
        return "text('COLUMN_NAME')"
    elif 'date' in sqlite_type:
        return 'date'
    elif 'time' in sqlite_type:
        return 'time'
    elif 'bool' in sqlite_type:
        return 'boolean'
    return "string('COLUMN_NAME')"

# Get all tables
cursor.execute("SELECT name, sql FROM sqlite_master WHERE type='table';")
tables = cursor.fetchall()

migration_stub = """<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{{
    public function up()
    {{
        Schema::create('{table_name}', function (Blueprint $table) {{
{columns}
        }});
    }}

    public function down()
    {{
        Schema::dropIfExists('{table_name}');
    }}
}};
"""

migration_files = []
migration_idx = 1

seeder_stub = """<?php

namespace Database\\Seeders;

use Illuminate\\Database\\Console\\Seeds\\WithoutModelEvents;
use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;

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
"""

for table_name, create_sql in tables:
    if table_name.startswith('sqlite_') or table_name.startswith('django_') or table_name == 'auth_group' or table_name.startswith('auth_') or table_name == 'sqlite_sequence':
        continue
        
    cursor.execute(f"PRAGMA table_info({table_name});")
    columns_info = cursor.fetchall()
    
    col_str = ""
    for col in columns_info:
        col_name = col[1]
        col_type = col[2]
        is_pk = col[5]
        
        if is_pk:
            col_str += f"            $table->id();\n"
        else:
            mapped = map_type(col_type)
            if 'COLUMN_NAME' in mapped:
                mapped = mapped.replace('COLUMN_NAME', col_name)
            else:
                mapped = f"{mapped}('{col_name}')"
            
            # Since some fields might be null in sqlite but we don't know, allow nullable to be safe
            col_str += f"            $table->{mapped}->nullable();\n"

    filename = f"laravel_app/database/migrations/2026_04_11_0000{migration_idx:02d}_create_{table_name}_table.php"
    with open(filename, 'w') as f:
        f.write(migration_stub.format(table_name=table_name, columns=col_str))
    
    migration_idx += 1

with open("laravel_app/database/seeders/DatabaseSeeder.php", "w") as f:
    f.write(seeder_stub)
    
print("Generated Laravel Migrations and Seeder successfully.")
conn.close()

import sqlite3
import json

def dict_factory(cursor, row):
    d = {}
    for idx, col in enumerate(cursor.description):
        d[col[0]] = row[idx]
    return d

conn = sqlite3.connect('db.sqlite3')
conn.row_factory = dict_factory
cursor = conn.cursor()

# Get all tables
cursor.execute("SELECT name FROM sqlite_master WHERE type='table';")
tables = cursor.fetchall()

dump_data = {}

for table_info in tables:
    table_name = table_info['name']
    # Skip sqlite internal tables
    if table_name.startswith('sqlite_'):
        continue
    
    cursor.execute(f"SELECT * FROM {table_name}")
    rows = cursor.fetchall()
    dump_data[table_name] = rows

with open('database_dump.json', 'w') as f:
    json.dump(dump_data, f, indent=4)

print("Data exported successfully to database_dump.json")
conn.close()

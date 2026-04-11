import shutil
import os

source_dir = 'static'
target_dir = 'laravel_app/public'

if os.path.exists(source_dir):
    for item in os.listdir(source_dir):
        s = os.path.join(source_dir, item)
        d = os.path.join(target_dir, item)
        if os.path.isdir(s):
            shutil.copytree(s, d, dirs_exist_ok=True)
        else:
            shutil.copy2(s, d)
    print("Static files migrated successfully.")
else:
    print("No static directory found.")

import shutil
import os

source_dir = 'media'
target_dir = 'laravel_app/storage/app/public'

if os.path.exists(source_dir):
    for item in os.listdir(source_dir):
        s = os.path.join(source_dir, item)
        d = os.path.join(target_dir, item)
        if os.path.isdir(s):
            shutil.copytree(s, d, dirs_exist_ok=True)
        else:
            shutil.copy2(s, d)
    print("Media files migrated successfully.")
else:
    print("No media directory found.")

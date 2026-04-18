import os
import re

directory = 'resources/views/admin'

def process_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Fix sidebar specifically
    if filepath.endswith('sidebar.blade.php'):
        content = content.replace('href="index.html"', 'href="/admin"')
        
        # any href="/XYZ" that are not "/admin" shouldn't happen, we prefix them
        # only modify standard hrefs.
        content = re.sub(r'href="/(show[a-zA-Z]+|add[a-zA-Z]+)"', r'href="/admin/\1"', content)

    # Replace bad loops
    # Look for mixed loops: {% for \w+ in \w+ %} that didn't get caught because of weird chars
    # I already did `{% for \w+ in \w+ %}`. Let's do `{% for (\w+) in ([a-zA-Z0-9_\.]+) %}`
    content = re.sub(r'\{%\s*for\s+(\w+)\s+in\s+([a-zA-Z0-9_\.]+)\s*%\}', r'@foreach($\2 as $\1)', content)
    content = re.sub(r'\{%\s*endfor\s*%\}', r'@endforeach', content)

    # Convert {% if x %} to @if(x)
    content = re.sub(r'\{%\s*if\s+([a-zA-Z0-9_\.]+)\s*%\}', r'@if($\1)', content)
    content = re.sub(r'\{%\s*if\s+not\s+([a-zA-Z0-9_\.]+)\s*%\}', r'@if(!$\1)', content)
    content = re.sub(r'\{%\s*endif\s*%\}', r'@endif', content)

    # Fix `{{ i.image }}` inside @if / src. Wait, previous script did:
    # {{ i.name }} -> {{ $i->name }}
    # Let's fix missing ones: `{{ i.id }}` might be okay, `{{i.phoneno}}` without space:
    def fix_var(match):
        var = match.group(1).strip()
        parts = var.split('.')
        if len(parts) > 1:
            result = f"${parts[0]}->" + "->".join(parts[1:])
        else:
            result = f"${parts[0]}"
        return '{{ ' + result + ' }}'
    content = re.sub(r'\{\{\s*([a-zA-Z0-9_\.]+)\s*\}\}', fix_var, content)

    # Fix Delete operation endpoints.
    # From href="/delete/{{ $i->id }}" to href="/admin/deleteregistration/{{ $i->id }}" (depending on filename)
    filename = os.path.basename(filepath)
    if filename == 'showteam.blade.php':
        content = content.replace('href="/delete/', 'href="/admin/deleteteam/')
        content = content.replace('href="/updateteam/', 'href="/admin/updateteam/')
    elif filename == 'showroom.blade.php':
        content = content.replace('href="/delete/', 'href="/admin/deleteroom/')
        content = content.replace('href="/updateroom/', 'href="/admin/updateroom/')
    elif filename == 'showregistration.blade.php':
        content = content.replace('href="/delete/', 'href="/admin/deleteregistration/')
    elif filename == 'showtest.blade.php':
        content = content.replace('href="/delete/', 'href="/admin/deletetest/')
        content = content.replace('href="/updatetest/', 'href="/admin/updatetest/')
        
    # Also update form actions
    if filename == 'addroom.blade.php':
        content = content.replace('action="/addroom"', 'action="/admin/addroom"')
        content = content.replace('action="addroom"', 'action="/admin/addroom"')
    elif filename == 'addteam.blade.php':
        content = content.replace('action="/addteam"', 'action="/admin/addteam"')
        content = content.replace('action="addteam"', 'action="/admin/addteam"')
    elif filename == 'addtest.blade.php':
        content = content.replace('action="/addtest"', 'action="/admin/addtest"')
    elif filename == 'updateroom.blade.php':
        content = re.sub(r'action="/updateroom/[^"]*"', 'action="/admin/updateroom/{{ $data->id }}"', content)
        # some static replacements
        content = content.replace('value=" {{ $data->price }}"', 'value="{{ $data->price }}"')
        content = content.replace('value=" {{ $data->title }}"', 'value="{{ $data->title }}"')
    elif filename == 'updateteam.blade.php':
        content = re.sub(r'action="/updateteam/[^"]*"', 'action="/admin/updateteam/{{ $data11->id }}"', content)
    elif filename == 'updatetest.blade.php':
        content = re.sub(r'action="/updatetest/[^"]*"', 'action="/admin/updatetest/{{ $data->id }}"', content)

    # In Laravel forms, `enctype="multipart/form-data"` is sometimes missing or `@csrf` wasn't added properly. Let's make sure.
    if '<form' in content and '@csrf' not in content:
        content = re.sub(r'(<form[^>]*>)', r'\1\n                                @csrf', content)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

for filename in os.listdir(directory):
    if filename.endswith('.blade.php'):
        process_file(os.path.join(directory, filename))

print("Fix applied.")

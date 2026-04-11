import os
import shutil
import re

source = 'templates/user'
dest = 'laravel_app/resources/views/user'
os.makedirs(dest, exist_ok=True)

for root, _, files in os.walk(source):
    for file in files:
        if file.endswith('.html'):
            src_file = os.path.join(root, file)
            # Create subdirectories if any
            rel_path = os.path.relpath(root, source)
            dest_dir = dest if rel_path == '.' else os.path.join(dest, rel_path)
            os.makedirs(dest_dir, exist_ok=True)
            
            dest_file = os.path.join(dest_dir, file.replace('.html', '.blade.php'))
            
            with open(src_file, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            # 1. Remove {% load static %} and similar
            content = re.sub(r'{%\s*load\s+.*?\s*%}', '', content)
            
            # 2. CSRF Token
            content = re.sub(r'{%\s*csrf_token\s*%}', '@csrf', content)
            
            # 3. Else/Endif/Endfor
            content = re.sub(r'{%\s*else\s*%}', '@else', content)
            content = re.sub(r'{%\s*endif\s*%}', '@endif', content)
            content = re.sub(r'{%\s*endfor\s*%}', '@endforeach', content)
            
            # 4. For loops: {% for val in data %} -> @foreach($data as $val)
            content = re.sub(r'{%\s*for\s+(\w+)\s+in\s+(\w+)\s*%}', r'@foreach($\2 as $\1)', content)
            
            # 5. If statements: prepeding $ and handling common Django patterns
            def if_repl(match):
                cond = match.group(1).strip()
                # Replace request.session.xxx with session('xxx')
                cond = re.sub(r'request\.session\.(\w+)', r"session('\1')", cond)
                # Replace forloop.counter
                cond = cond.replace('forloop.counter', '$loop->iteration')
                # Prepend $ to variables that don't have it and are not numbers/booleans/strings
                if re.match(r'^[a-zA-Z_][a-zA-Z0-9_]*$', cond) and cond not in ['True', 'False', 'None']:
                    return f'@if(${cond})'
                return f'@if({cond})'

            content = re.sub(r'{%\s*if\s+(.+?)\s*%}', if_repl, content)

            # 6. Django Filters (Special Case: json_script)
            # {{ var|json_script:"id" }} -> <script id="id" type="application/json">@json($var)</script>
            def json_script_repl(match):
                var_name = match.group(1).strip()
                script_id = match.group(2).strip()
                return f'<script id="{script_id}" type="application/json">@json($' + var_name + ')</script>'
            
            content = re.sub(r'{{\s*(\w+)\|json_script:[\'"](.+?)[\'"]\s*}}', json_script_repl, content)

            # 7. Variables: {{ val.name }} -> {{ $val->name }}
            def var_repl(match):
                var_chain = match.group(1).strip()
                parts = var_chain.split('.')
                
                # Special cases: request.session
                if parts[0] == 'request' and len(parts) > 2 and parts[1] == 'session':
                    return "{{ session('" + parts[2] + "') }}"
                
                # Special cases: request.GET or request.POST
                if parts[0] == 'request' and len(parts) > 2 and parts[1] in ['GET', 'POST']:
                    return "{{ request()->get('" + parts[2] + "') }}"
                
                # Special case: Image URLs (.url suffix)
                if parts[-1] == 'url':
                    base_chain = '$' + '->'.join(parts[:-1])
                    return "{{ asset('storage/' . " + base_chain + ") }}"
                
                # Default property access
                res = '$' + parts[0]
                if len(parts) > 1:
                    res += '->' + '->'.join(parts[1:])
                return '{{ ' + res + ' }}'
                
            # Match {{ something }} but not static or other tags
            content = re.sub(r'{{\s*([a-zA-Z0-9_][a-zA-Z0-9_.]*)\s*}}', var_repl, content)
            
            # 8. Static and Media
            content = content.replace('/media/', '/storage/')
            content = re.sub(r'{%\s*static\s+[\'"](.+?)[\'"]\s*%}', r"{{ asset('\1') }}", content)
            
            # 9. URL references
            content = re.sub(r'{%\s*url\s+[\'"](.+?)[\'"]\s*%}', r"{{ route('\1') }}", content)

            with open(dest_file, 'w', encoding='utf-8') as f:
                f.write(content)

print("Templates converted to Blade successfully with JSON script support.")

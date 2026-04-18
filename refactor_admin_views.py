import os
import re

directory = 'resources/views/admin'
layout_path = 'layouts/admin'

def refactor_file(filepath):
    filename = os.path.basename(filepath)
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Special case for sidebar.blade.php (Dashboard)
    if filename == 'sidebar.blade.php':
        title = "Dashboard"
        # Find the content inside <main class="content">
        match = re.search(r'<main class="content">\s*<div class="container-fluid p-0">(.*?)</div>\s*</main>', content, re.DOTALL)
        if match:
            inner_content = match.group(1).strip()
        else:
            inner_content = """
            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h2>Welcome back to the Admin Panel!</h2>
                    <p class="text-muted">Use the sidebar to navigate your database.</p>
                </div>
            </div>
            """
    else:
        # For other files, the content is usually between </nav> and </div>\s*</div>\s*<script
        # But wait, my previous script added <table ...> after </nav> in some files.
        # Let's find content between </nav> and the first </div> that closes <div class="main">? No.
        # Let's look for the main content area.
        # usually </div>\s*</div>\s*<script at the end.
        
        # Try to find content between the end of the top navbar and the closing wrapper divs.
        # The navbar ends with </nav>
        # Let's find the last </nav> (which is the top navbar)
        nav_indices = [m.start() for m in re.finditer('</nav>', content)]
        if not nav_indices:
            return
            
        last_nav_end = nav_indices[-1] + 6
        
        # The footer/end usually starts before the first script tag or after the last content div.
        # Let's look for the script tag
        script_idx = content.find('<script')
        if script_idx == -1:
            script_idx = len(content)
            
        # The content is between the last </nav> and the script tag, BUT we need to strip the wrapping divs if they exist.
        # Usually: </nav>\n CONTENT \n </div>\n </div>\n <script
        inner_content = content[last_nav_end:script_idx].strip()
        
        # Remove trailing </div></div>
        inner_content = re.sub(r'</div>\s*</div>\s*$', '', inner_content).strip()
        
        title = filename.replace('.blade.php', '').replace('show', 'Show ').replace('add', 'Add ').title()

    new_content = f"""@extends('{layout_path}')

@section('title', '{title}')

@section('content')
{inner_content}
@endsection
"""
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(new_content)

for fn in os.listdir(directory):
    if fn.endswith('.blade.php'):
        refactor_file(os.path.join(directory, fn))

print("Refactoring complete.")

import os
import re

directory = 'resources/views/admin'

def fix_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
        
    filename = os.path.basename(filepath)
    
    # Prefix all broken relative URLs explicitly
    content = content.replace('href="delete/', 'href="/admin/delete_PLACEHOLDER/')
    content = content.replace('href="updateteam/', 'href="/admin/updateteam/')
    content = content.replace('href="updateroom/', 'href="/admin/updateroom/')
    content = content.replace('href="updatetest/', 'href="/admin/updatetest/')
    
    # Specific delete placeholders based on file context
    if filename == 'showteam.blade.php':
        content = content.replace('/admin/delete_PLACEHOLDER/', '/admin/deleteteam/')
    elif filename == 'showroom.blade.php':
        content = content.replace('/admin/delete_PLACEHOLDER/', '/admin/deleteroom/')
    elif filename == 'showregistration.blade.php':
        content = content.replace('/admin/delete_PLACEHOLDER/', '/admin/deleteregistration/')
    elif filename == 'showtest.blade.php':
        content = content.replace('/admin/delete_PLACEHOLDER/', '/admin/deletetest/')
    
    # Any residual missing slashes
    content = content.replace('href="addteam"', 'href="/admin/addteam"')
    content = content.replace('href="addroom"', 'href="/admin/addroom"')
    content = content.replace('href="addtest"', 'href="/admin/addtest"')
    
    # Add filler content strictly for the main dashboard sidebar.blade.php because it's completely blank
    if filename == 'sidebar.blade.php':
        if '<main class="content">' not in content:
            dashboard_content = """
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <h2>Welcome back to the Admin Panel!</h2>
                            <p class="text-muted">Use the sidebar to navigate your database.</p>
                        </div>
                    </div>
                </div>
            </main>
            """
            # Insert this after the navbar closing
            content = content.replace('</nav>', '</nav>' + dashboard_content)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

for fn in os.listdir(directory):
    if fn.endswith('.blade.php'):
        fix_file(os.path.join(directory, fn))

print("Links fixed.")

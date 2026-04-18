import os
import re

directory = 'resources/views/admin'

def fix_view(filepath):
    filename = os.path.basename(filepath)
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. Fix addteam labels
    if filename == 'addteam.blade.php':
        content = content.replace('Price', 'Name')
        content = content.replace('Bed ', 'Designation ')
    
    # 2. Fix showorder
    if filename == 'showorder.blade.php':
        content = content.replace('<td><a href="/admin/updateroom/{{ $i->id }}">Update</a></td>', '<!-- No Update for Order -->')
        content = content.replace('/admin/delete_PLACEHOLDER/', '/admin/deleteorder/')
        
    # 3. Systematic Uncomment and Route Fix for Delete links
    # Matches: <!-- <td><a href="...">Delete</a></td> --> (varying whitespace)
    def uncomment_delete(match):
        route_map = {
            'showcheckout.blade.php': '/admin/deletecheckout/',
            'showcontact.blade.php': '/admin/deletecontact/',
            'showappointment.blade.php': '/admin/deleteappointment/',
            'showbooking.blade.php': '/admin/deletebooking/',
            'shownews.blade.php': '/admin/deletenews/',
            'showlogin.blade.php': '/admin/deleteregistration/', # login list is actually signup list
            'showregistration.blade.php': '/admin/deleteregistration/'
        }
        route = route_map.get(filename, '/admin/delete_FIXME/')
        return f'      <td><a href="{route}{{{{ $i->id }}}}">Delete</a></td>'

    content = re.sub(r'<!--\s*<td[^>]*><a\s+href="[^"]*">Delete</a>\s*</td>\s*-->', uncomment_delete, content)
    
    # Also handle some edge cases where the href was empty or different
    if filename == 'showcontact.blade.php':
        content = content.replace('href=""', 'href="/admin/deletecontact/{{ $i->id }}"')
    elif filename == 'showappointment.blade.php':
         content = content.replace('href=""', 'href="/admin/deleteappointment/{{ $i->id }}"')
    elif filename == 'showbooking.blade.php':
         content = content.replace('href=""', 'href="/admin/deletebooking/{{ $i->id }}"')
    elif filename == 'shownews.blade.php':
         content = content.replace('href=""', 'href="/admin/deletenews/{{ $i->id }}"')

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

for fn in os.listdir(directory):
    if fn.endswith('.blade.php'):
        fix_view(os.path.join(directory, fn))

print("Final UI fixes complete.")

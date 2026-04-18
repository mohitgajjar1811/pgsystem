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
        content = content.replace('/admin/updateroom/', '/admin/updateorder/') # Although updateorder isn't implemented, it's better than updateroom if they ever implement it.
        # Actually, let's just remove the update link if it's not implemented.
        content = content.replace('<td><a href="/admin/updateorder/{{ $i->id }}">Update</a></td>', '<!-- No Update for Order -->')
        content = content.replace('/admin/delete_PLACEHOLDER/', '/admin/deleteorder/')
        
    # 3. Uncomment and fix other delete links
    content = content.replace('<!--      <td><a href="/admin/delete_PLACEHOLDER/{{ $i->id }}">Delete</a></td>-->', '      <td><a href="/admin/deletecheckout/{{ $i->id }}">Delete</a></td>')
    
    # Handle others like showcontact, showappointment, showbooking, shownews
    if filename == 'showcontact.blade.php':
        content = content.replace('<!--        <td><a href="">Delete</a> </td>-->', '        <td><a href="/admin/deletecontact/{{ $i->id }}">Delete</a> </td>')
    elif filename == 'showappointment.blade.php':
        content = content.replace('<!--      <td><a href="">Delete</a></td>-->', '      <td><a href="/admin/deleteappointment/{{ $i->id }}">Delete</a></td>')
    elif filename == 'showbooking.blade.php':
        content = content.replace('<!--      <td><a href="">Delete</a></td>-->', '      <td><a href="/admin/deletebooking/{{ $i->id }}">Delete</a></td>')
    elif filename == 'shownews.blade.php':
        content = content.replace('<!--      <td><a href="">Delete</a></td>-->(wait, there was a loop)', '') # let's be more specific
        content = re.sub(r'<!--\s*<td><a href="">Delete</a></td>\s*-->', r'      <td><a href="/admin/deletenews/{{ $j->id }}">Delete</a></td>', content)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

for fn in os.listdir(directory):
    if fn.endswith('.blade.php'):
        fix_view(os.path.join(directory, fn))

print("UI fixes complete.")

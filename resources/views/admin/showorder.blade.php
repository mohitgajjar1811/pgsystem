@extends('layouts/admin')
@section('title', 'Orders')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Orders</h1>
</div>

@include('admin.partials.filters')

<div id="admin-table-container">
    <form id="bulk-delete-form" method="POST" action="/admin/delete-multiple-orders">
        @csrf
        <div class="mb-4 flex justify-end">
            <button type="button" onclick="submitBulkDelete()" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md text-sm transition-colors flex items-center">
                <i data-feather="trash-2" class="w-4 h-4 mr-2"></i> Delete Selected
            </button>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3 w-12">
                        <input type="checkbox" id="selectAll" class="rounded border-gray-300">
                    </th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">ID</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Amount</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">User ID</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Email</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Name</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Room Details</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($data13 as $i)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-3">
                        <input type="checkbox" name="ids[]" value="{{ $i->id }}" class="bulk-checkbox rounded border-gray-300">
                    </td>
                    <td class="px-6 py-3 text-gray-400 font-mono text-xs">#{{ $i->id }}</td>
                    <td class="px-6 py-3 font-semibold text-gray-800">₹{{ $i->amt }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->uid }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->email }}</td>
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $i->firstname }}</td>
                    <td class="px-6 py-3 text-gray-500 max-w-xs truncate">{{ $i->blog_data }}</td>
                    <td class="px-6 py-3 text-right">
                        <a href="/admin/deleteorder/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                           onclick="return confirm('Delete this order?')">
                            <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4 border-t border-gray-50">
            {{ $data13->links() }}
        </div>
    </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.bulk-checkbox');

        if (selectAll) {
            selectAll.addEventListener('change', function() {
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        }
    });

    function submitBulkDelete() {
        const checkedBoxes = document.querySelectorAll('.bulk-checkbox:checked');
        if (checkedBoxes.length === 0) {
            alert('Please select at least one order to delete.');
            return;
        }
        if (confirm('Are you sure you want to delete all selected orders?')) {
            document.getElementById('bulk-delete-form').submit();
        }
    }
</script>

@endsection

@extends('layouts/admin')
@section('title', 'Bookings')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Bookings</h1>
</div>

@include('admin.partials.filters')

<div id="admin-table-container">
    <form id="bulk-delete-form" method="POST" action="/admin/delete-multiple-bookings">
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
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Name</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Email</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Mobile</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Joining Date</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Room</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Booked Beds</th>
                    <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($data as $i)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-3">
                        <input type="checkbox" name="ids[]" value="{{ $i->id }}" class="bulk-checkbox rounded border-gray-300">
                    </td>
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $i->name }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->email }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->mobileno }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->joiningdate }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $i->adult }}</td>
                    <td class="px-6 py-3 text-gray-500 max-w-xs truncate">{{ $i->specialrequest }}</td>
                    <td class="px-6 py-3">
                        <a href="/admin/deletebooking/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                           onclick="return confirm('Delete this booking?')">
                            <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4 border-t border-gray-50">
            {{ $data->links() }}
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
            alert('Please select at least one booking to delete.');
            return;
        }
        if (confirm('Are you sure you want to delete all selected bookings?')) {
            document.getElementById('bulk-delete-form').submit();
        }
    }
</script>

@endsection

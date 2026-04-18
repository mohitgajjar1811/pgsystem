@extends('layouts/admin')
@section('title', 'Rooms')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Rooms</h1>
    <a href="/admin/addroom" class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors no-underline">
        <i data-feather="plus" style="width:16px;height:16px;stroke-width:2.5;"></i> Add Room
    </a>
</div>

@include('admin.partials.filters')

<div id="admin-table-container">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Image</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Title</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Price</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Bed Type</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Details</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($data as $i)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-3">
                    <div class="w-12 h-10 rounded-lg overflow-hidden border border-gray-100">
                        <img src="{{ asset('img_uploads/' . $i->image) }}" class="w-full h-full object-cover" onerror="this.src='/img_uploads/placeholder.png'">
                    </div>
                </td>
                <td class="px-6 py-3 font-medium text-gray-800">{{ $i->title }}</td>
                <td class="px-6 py-3 text-gray-600">₹{{ $i->price }}</td>
                <td class="px-6 py-3 text-gray-600">{{ $i->bed }}</td>
                <td class="px-6 py-3 text-gray-500 max-w-xs truncate">{{ $i->detail }}</td>
                <td class="px-6 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="/admin/updateroom/{{ $i->id }}" class="p-1.5 text-gray-400 hover:text-gray-900 transition-colors">
                            <i data-feather="edit-3" style="width:16px;height:16px;"></i>
                        </a>
                        <a href="/admin/deleteroom/{{ $i->id }}" class="p-1.5 text-gray-400 hover:text-red-600 transition-colors" onclick="return confirm('Delete this room?')">
                            <i data-feather="trash-2" style="width:16px;height:16px;"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if(count($data) > 0)
    <div class="px-6 py-4 border-t border-gray-50">
        {{ $data->links() }}
    </div>
    @else
    <div class="text-center py-12 text-gray-400">
        <p class="text-sm">No rooms found matching your criteria.</p>
    </div>
    @endif
</div>
</div>

@endsection

@extends('layouts/admin')
@section('title', 'Rooms')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Rooms</h1>
    <a href="/admin/addroom" class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors no-underline">
        <i data-feather="plus" style="width:16px;height:16px;stroke-width:2.5;"></i> Add Room
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Image</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Title</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Price</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Bed</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Detail</th>
                <th class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($data as $i)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-3">
                    <img src="{{ asset('img_uploads/' . $i->image) }}" class="h-12 w-16 rounded-lg object-cover" alt="{{ $i->title }}">
                </td>
                <td class="px-6 py-3 font-medium text-gray-800">{{ $i->title }}</td>
                <td class="px-6 py-3 text-gray-600">₹{{ $i->price }}</td>
                <td class="px-6 py-3 text-gray-600">{{ $i->bed }}</td>
                <td class="px-6 py-3 text-gray-500 max-w-xs truncate">{{ $i->detail }}</td>
                <td class="px-6 py-3 flex items-center gap-2">
                    <a href="/admin/updateroom/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-md no-underline transition-colors">
                        <i data-feather="edit-2" style="width:12px;height:12px;"></i> Edit
                    </a>
                    <a href="/admin/deleteroom/{{ $i->id }}" class="inline-flex items-center gap-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md no-underline transition-colors"
                       onclick="return confirm('Delete this room?')">
                        <i data-feather="trash-2" style="width:12px;height:12px;"></i> Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(count($data) === 0)
    <div class="text-center py-12 text-gray-400">
        <i data-feather="home" style="width:40px;height:40px;" class="mx-auto mb-3 opacity-40"></i>
        <p class="text-sm">No rooms found.</p>
    </div>
    @endif
</div>

@endsection
